<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Monthly_sale;
class MonthlysaleController extends Controller
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
        $monthlysales=Monthly_sale::all('id','name')->sortByDesc("created_at");
        return response()->json($monthlysales);
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
        $monthlysale=new Monthly_sale($request->all());
        try{
            $monthlysale->save();
            return response()->json([
            'msgtype'=>'success',
            'body'=>'monthlysale created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'monthlysale creation failed.error '.$errorCode
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
        $monthlysale=Monthly_sale::find($id);
        return response()->json($monthlysale);
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
        $monthlysale=Monthly_sale::find($id);
        $inputs=$request->all();
        $monthlysale->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'monthlysale updated successfully.'
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
        $monthlysale=Monthly_sale::find($id);
        $monthlysale->delete();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'monthlysale deleted successfully.'
            ]);
    }
}
