<?php

namespace App\Http\Controllers\Admin;

use App\Update;
use App\Device;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UpdateController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin',['except'=>['getBuild']]);
        $this->middleware('clearance',['except'=>['getBuild']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checkToken($token)
    {
        if(count(Admin::where('apitoken',$token)->first())>0){
            return true;
        }
        return false;
    }

    public function getBuild(Request $request)
    {
        if($this->checkToken($request->input('token'))){
            $devicename=$request->input('devicename');
            //print_r($devicename);
            $device=Device::where('name',$devicename)->first();
            //print_r($device);    
            $update=Update::where('device_id',$device->id)->get(['buildversion','ziplink','changelog','xdathread'])->first();
            return response()->json($update);
        }
        return response()->json(['error'=>'no data']);
    }


    public function index()
    {   
        $userId = Auth::User('admin')->id;
        //print_r($userId);
        if($userId==3){
            $updates=Update::all('id','device_id','buildversion','ziplink','changelog','xdathread')->sortByDesc("created_at");
            foreach ($updates as $key => $update) {
                $device=Device::where('id',$update->device_id)->first();
                $updates[$key]['devicemodel']=$device['model'];
                $updates[$key]['devicename']=$device['name'];
                if($device->admin_id!=0){
                    $admin=Admin::find($device->admin_id);
                    $updates[$key]['maintainer']=$admin->name;
                }else{
                    $updates[$key]['maintainer']="UnAssigned";
                }
                unset($updates[$key]['device_id']);
            }
            return response()->json($updates);
        }else{
            $devices=Device::where('admin_id',$userId)->get()->toArray();
            $device_ids=array_column($devices,'id');
            $updates=Update::whereIn('device_id',$device_ids)->get();
            foreach ($updates as $key => $update) {
                $device=Device::where('id',$update->device_id)->first();
                $updates[$key]['devicemodel']=$device['model'];
                $updates[$key]['devicename']=$device['name'];
                if($device->admin_id!=0){
                    $admin=Admin::find($device->admin_id);
                    $updates[$key]['maintainer']=$admin->name;
                }else{
                    $updates[$key]['maintainer']="UnAssigned";
                }
                unset($updates[$key]['device_id']);
                unset($updates[$key]['created_at']);
                unset($updates[$key]['updated_at']);
                unset($updates[$key]['deleted_at']);
            }
            return response()->json($updates);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $update=new Update($request->all());
        try{
        $update->save();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Update Saved successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Update Saving failed.error '.$errorCode
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        $update=Update::where('id',$id)->get(['id','devicemodel','buildversion','ziplink','changelog','xdathread'])->first();
        return response()->json($update);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update=Update::find($id);
        return response()->json($update);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update=Update::find($id);
        $dev=Device::findOrFail($update->device_id);
        $inputs=$request->all();
        $update->update($inputs);
        //update api call start
        $title = 'FireHound Update available';
        $body = 'Build ' . $request['buildversion'];
        $device = $dev->name;
        $url = 'https://fcm.googleapis.com/fcm/send';
        $server_key = 'AAAAisGeVBo:APA91bFJrVs91Hmssv5VD3h8K8rRfNN_5u0vwjSbzx0eZn1sJEiR2FN4IlI9_ZfYzl0rNdgtqIkLb_zvmhsxYrGrO2TwgIUF78SrZh0QvG14yMtLNwY3_UHvxa5Dy0JcqxbNUAY8VGfO';
        $data=array('title'=>$title,'body'=>$body);
        $fields = array();
        $fields['data'] = $data;
        //to contents will be replaced by device ID
        $fields['to'] = '/topics/' . $device;
        //header with content_type api key
        $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$server_key
        );
            
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        //update api call end
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Update updated successfully.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $update=Update::find($id);
        Device::destroy($update->device_id);
        Update::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Update deleted successfully.'
            ]);
    }
}
