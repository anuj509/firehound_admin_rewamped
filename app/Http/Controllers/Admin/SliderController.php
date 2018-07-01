<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
class SliderController extends Controller
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
        $sliders=Slider::all('id','image','captionheader','caption','isActive')->sortByDesc("created_at");
        return response()->json($sliders);
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
        //print_r($request->input());
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
        $slider=new Slider($request->all());
        try{
            $slider->save();
            return response()->json([
            'msgtype'=>'success',
            'body'=>'slider created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'slider creation failed.error '.$errorCode
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
        $slider=Slider::where('id',$id)->get(['id','image','captionheader','caption','isActive'])->first();
        return response()->json($slider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return response()->json($slider);
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
        $slider=Slider::find($id);
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
        $slider->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'slider updated successfully.'
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
        Slider::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'slider deleted successfully.'
            ]);   
    }
}
