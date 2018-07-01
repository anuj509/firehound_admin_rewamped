<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
class ServiceController extends Controller
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
        $services=Service::all('id','image','title','description')->sortByDesc("created_at");
        return response()->json($services);
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
        $service=new Service($request->all());
        try{
        $service->save();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Service created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Service creation failed.error '.$errorCode
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
        $service=Service::where('id',$id)->get(['id','title','image','description'])->first();
        return response()->json($service);
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
        $service=Service::find($id);
        $inputs=$request->all();
        $service->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Service updated successfully.'
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
        Service::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Service deleted successfully.'
            ]);
    }
}
