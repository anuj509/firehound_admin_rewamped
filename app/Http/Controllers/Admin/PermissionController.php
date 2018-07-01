<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\PermissionRole;
class PermissionController extends Controller
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
        $permissions=Permission::all('id','name','display_name','description')->sortByDesc("created_at");
        return response()->json($permissions);
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
        $permission=new Permission($request->all());
        try{
            $permission->save();
            return response()->json([
            'msgtype'=>'success',
            'body'=>'Permission created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            //print_r($e);
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Permission creation failed.error '.$errorCode
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
        $permission=Permission::where('id',$id)->get(['id','name','display_name','description'])->first();
        return response()->json($permission);
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
        $permission=Permission::find($id);
        $inputs=$request->all();
        $permission->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Permission updated successfully.'
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
        Permission::destroy($id);
        PermissionRole::where('permission_id',$id)->delete();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Permission deleted successfully.'
            ]);
    }
}
