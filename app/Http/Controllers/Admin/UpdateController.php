<?php

namespace App\Http\Controllers\Admin;

use App\Update;
use App\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:admin','clearance']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updates=Update::all('id','device_id','buildversion','ziplink','changelog','xdathread')->sortByDesc("created_at");
        foreach ($updates as $key => $update) {
            $device=Device::where('id',$update->device_id)->first();
            $updates[$key]['devicemodel']=$device['model'];
            $updates[$key]['devicename']=$device['name'];
            unset($updates[$key]['device_id']);
        }
        return response()->json($updates);
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
        $inputs=$request->all();
        $update->update($inputs);
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
        Update::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Update deleted successfully.'
            ]);
    }
}
