<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Device;
use App\Admin;
use App\Update;
class DeviceController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin');
        $this->middleware('clearance',['except'=>['getDevices']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices=Device::all('id','admin_id','name','model')->sortByDesc("created_at");
        foreach ($devices as $key => $device) {
            if($devices[$key]['admin_id']!=0){
                $admin=Admin::where('id',$devices[$key]['admin_id'])->first();
                $devices[$key]['maintainer']=$admin['name'];
            }else{
                $devices[$key]['maintainer']="UnAssigned";
            }
            unset($devices[$key]['admin_id']);
        }
        return response()->json($devices);
    }

    public function getDevices()
    {
        $devices=Device::where('admin_id','0')->get();
        foreach ($devices as $key => $device) {
            if($devices[$key]['admin_id']!=0){
                $admin=Admin::where('id',$devices[$key]['admin_id'])->first();
                $devices[$key]['maintainer']=$admin['name'];
            }else{
                $devices[$key]['maintainer']="UnAssigned";
            }
            unset($devices[$key]['admin_id']);
        }
        return response()->json($devices);
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
        $request->merge(array('admin_id'=>0));
        $device=new Device($request->all());
        try{
            $device->save();
            $update=new Update([
                'device_id'=>$device->id,
                'buildversion'=>'',
                'ziplink'=>'',
                'changelog'=>'',
                'xdathread'=>''
            ]);
            $update->save();
            return response()->json([
                'msgtype'=>'success',
                'body'=>'Device Saved successfully.'
                ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Device Saving failed.error '.$errorCode
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device=Device::where('id',$id)->get(['id','admin_id','name','model'])->first();
        $device['device_id[]']=$id;
        return response()->json($device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device=Device::find($id);
        $device['device_id[]']=$id;
        return response()->json($device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $device=Device::find($id);
        $inputs=$request->all();
        $device->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Device updated successfully.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Device deleted successfully.'
            ]);
    }
}
