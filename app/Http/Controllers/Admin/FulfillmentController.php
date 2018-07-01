<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fulfillment;
class FulfillmentController extends Controller
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
        $fulfillments=Fulfillment::all('id','name')->sortByDesc("created_at");
        return response()->json($fulfillments);
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
        $fulfillment=new Fulfillment($request->all());
        try{
            $fulfillment->save();
            return response()->json([
            'msgtype'=>'success',
            'body'=>'fulfillment created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'fulfillment creation failed.error '.$errorCode
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
        $fulfillment=Fulfillment::find($id);
        return response()->json($fulfillment);
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
        $fulfillment=Fulfillment::find($id);
        $inputs=$request->all();
        $fulfillment->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'fulfillment updated successfully.'
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
        $fulfillment=Fulfillment::find($id);
        $fulfillment->delete();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'fulfillment deleted successfully.'
            ]);
    }
}
