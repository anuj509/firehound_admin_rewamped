<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories_deal;
class CategoriesdealController extends Controller
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
        $categoriesdeals=Categories_deal::all('id','name','isGroupHeader')->sortByDesc("created_at");
        return response()->json($categoriesdeals);
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
        $categoriesdeal=new Categories_deal($request->all());
        try{
            $categoriesdeal->save();
            return response()->json([
            'msgtype'=>'success',
            'body'=>'categoriesdeal created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'categoriesdeal creation failed.error '.$errorCode
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
        $categoriesdeal=Categories_deal::find($id);
        return response()->json($categoriesdeal);
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
        $categoriesdeal=Categories_deal::find($id);
        $inputs=$request->all();
        $categoriesdeal->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'categoriesdeal updated successfully.'
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
        $categoriesdeal=Categories_deal::find($id);
        $categoriesdeal->delete();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'categoriesdeal deleted successfully.'
            ]);
    }
}
