<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use Auth;
class BlogController extends Controller
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
        $blogs=Blog::all('id','title','image','content','posted_by','created_at')->sortByDesc("created_at");
        return response()->json($blogs);
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
        $request->merge(array('posted_by'=>Auth::guard('admin')->user()->name));
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
        $blog=new Blog($request->all());
        try{
        $blog->save();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Blog created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Blog creation failed.error '.$errorCode
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
        $blog=Blog::where('id',$id)->get(['id','title','image','content'])->first();
        return response()->json($blog);
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
        $blog=Blog::find($id);
        $inputs=$request->all();
        $blog->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Blog updated successfully.'
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
        Blog::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Blog deleted successfully.'
            ]);
    }
}
