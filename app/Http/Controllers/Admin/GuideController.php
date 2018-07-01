<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Guide;
class GuideController extends Controller
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
        $guides=Guide::all('id','image','name','topics','content')->sortByDesc("created_at");
        return response()->json($guides);
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
        $request->merge(array('topics'=>json_encode($request['topics']),'content'=>json_encode($request['content'])));
        if($request['imagestring']!=null){
            define('UPLOAD_DIR', 'uploads/');
            $image_parts = explode(";base64,", $request['imagestring']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = UPLOAD_DIR . uniqid() . '.'.$image_type;
            file_put_contents($file, $image_base64);
            $request->offsetUnset('imagestring');
            $request->merge(array('image'=>'/'.$file));
        }
        $guide=new Guide($request->all());
        try{
        $guide->save();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Guide created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Guide creation failed.error '.$errorCode
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
        $guide=Guide::where('id',$id)->get(['id','image','name','topics','content'])->first();
        return response()->json($guide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guide=Guide::find($id);
        return response()->json($guide);
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
        //print_r($request->input());
        $guide=Guide::find($id);
        $request->merge(array('topics'=>json_encode($request['topics']),'content'=>json_encode($request['content'])));
        if($request['imagestring']!=null){
        define('UPLOAD_DIR', 'uploads/');
        $image_parts = explode(";base64,", $request['imagestring']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = UPLOAD_DIR . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);
        $request->offsetUnset('imagestring');
        $request->merge(array('image'=>'/'.$file));
        }
        $inputs=$request->all();
        $guide->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Guide updated successfully.'
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
        Guide::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Guide deleted successfully.'
            ]);
    }
}
