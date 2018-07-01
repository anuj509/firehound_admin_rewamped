<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use Auth;
class TicketController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:admin','clearance'])->except('history');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::all('id','refnumber','title','status','description','type','assigned_to')->sortByDesc("created_at")->toArray();
        foreach ($tickets as $index => $ticket) {
                foreach ($ticket as $key => $value) {
                    if(($key!='id')&&($key!='refnumber')){
                        $tickets[$index][$key] = json_decode($value,true)[0];
                    }
                }
        }
        return response()->json($tickets);
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
        $supportmember='notfound';
        $assigned_to=json_decode(app('App\Http\Controllers\Admin\AdminController')->getSupport($request)->getContent(),true);
        //print_r($assigned_to);
        if(count($assigned_to)>0)
        for($i=0;$i<count($assigned_to);$i++){
            if($assigned_to[$i]['id']==$request['admin_id']){
                $supportmember=$assigned_to[$i]['name'];
                break;
            }
        }
        $refnumber=$this->genWindowId(8);
            while((Ticket::where('refnumber',$refnumber)->get()->count())>0){
                $refnumber=$this->genWindowId(8);
            }
        //echo $supportmember;
        $request->merge(array('assigned_to'=>$supportmember));
        $request->offsetUnset('admin_id');
        $request->merge(array(
            'refnumber'=>$refnumber,
            'title'=>json_encode(array($request['title'])),
            'status'=>json_encode(array($request['status'])),
            'description'=>json_encode(array($request['description'])),
            'type'=>json_encode(array($request['type'])),
            'assigned_to'=>json_encode(array($request['assigned_to'])),
            'created_by'=>Auth::user('admin')->email,
            'usertype'=>'admins'
        ));
        $ticket=new Ticket($request->all());
        try{
        $ticket->save();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Ticket created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Ticket creation failed.error '.$errorCode
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket=Ticket::where('id',$id)->get(['id','refnumber','title','status','description','type','assigned_to'])->first()->toArray();
        foreach ($ticket as $key => $value) {
            if(($key!='id')&&($key!='refnumber')){
                $ticket[$key] = json_decode($value,true)[0];
            }
        }
        return response()->json($ticket);
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
        $ticket=Ticket::find($id);
        $supportmember='notfound';
        $assigned_to=json_decode(app('App\Http\Controllers\Admin\AdminController')->getSupport($request)->getContent(),true);
        //print_r($assigned_to);
        if(count($assigned_to)>0)
        for($i=0;$i<count($assigned_to);$i++){
            if($assigned_to[$i]['id']==$request['admin_id']){
                $supportmember=$assigned_to[$i]['name'];
                break;
            }
        }
        //echo $supportmember;
        $request->merge(array('assigned_to'=>$supportmember));
        $request->offsetUnset('admin_id');
        $request->merge(array(
            'title'=>json_encode(array_merge(array($request['title']),json_decode($ticket->title,true))),
            'status'=>json_encode(array_merge(array($request['status']),json_decode($ticket->status,true))),
            'description'=>json_encode(array_merge(array($request['description']),json_decode($ticket->description,true))),
            'type'=>json_encode(array_merge(array($request['type']),json_decode($ticket->type,true))),
            'assigned_to'=>json_encode(array_merge(array($request['assigned_to']),json_decode($ticket->assigned_to,true)))
        ));
        $inputs=$request->all();
        $ticket->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Ticket updated successfully.'
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
        Ticket::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Ticket deleted successfully.'
            ]);
    }

    public function history(Request $request,$id)
    {   
        $ticket=Ticket::where('id',$id)->get(['id','refnumber','title','status','description','type','assigned_to'])->first()->toArray();
        return response()->json($ticket);
    }

    public function genWindowId($length, $charset='0123456789')
        {
            $str = '';
            $count = strlen($charset);
            while ($length--) {
                $str .= $charset[mt_rand(0, $count-1)];
            }

            return $str;
        }
}
