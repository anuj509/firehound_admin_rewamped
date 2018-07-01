<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\PermissionRole;
class RoleController extends Controller
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
        $roles=Role::all('id','name','display_name','description')->sortByDesc("created_at");
        $permissionsStr='';
        foreach ($roles as $key => $role) {
            $permissionrole=PermissionRole::where('role_id',$role->id)->get();
            if(count($permissionrole)>0){
                $permissionids=array();
                foreach ($permissionrole as $index => $permission) {
                    $permissionids[]=$permission->permission_id;
                }
                $permissions=Permission::whereIn('id',$permissionids)->get();
                if(count($permissions)>0){
                    $permissionsStr=implode(',', array_map(function($x) { return $x['display_name']; }, $permissions->toArray()));
                }
            }
        $roles[$key]['permission_id']=$permissionids;
        $roles[$key]['permissions']=$permissionsStr;

        }
        return response()->json($roles);
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
        $permissionroles=array();
        foreach ($request['permission_id'] as $key => $value) {
            $permissionroles[]=new PermissionRole(['permission_id'=>$value]);
        }
        $request->offsetUnset('permission_id');
        $role=new Role($request->all());
        try{
            $role->save();
            foreach ($permissionroles as $key => $value) {
                $value->role_id=$role->id;
                $value->save();
            }
            return response()->json([
            'msgtype'=>'success',
            'body'=>'Role created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            //print_r($e);
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Role creation failed.error '.$errorCode
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
        $role=Role::where('id',$id)->get(['id','name','display_name','description'])->first();
        $permissionrole=PermissionRole::where('role_id',$role->id)->get();
            if(count($permissionrole)>0){
                $permissionids=array();
                foreach ($permissionrole as $index => $permission) {
                    $permissionids[]=$permission->permission_id;
                }
                $permissions=Permission::whereIn('id',$permissionids)->get();
                if(count($permissions)>0){
                    $permissionsStr=implode(',', array_map(function($x) { return $x['display_name']; }, $permissions->toArray()));
                }
            }
        $role['permission_id[]']=$permissionids;
        $role['permissions']=$permissionsStr;
        return response()->json($role);
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
        $role=Role::find($id);
        $permissionrole=PermissionRole::where('role_id',$id)->delete();
        foreach ($request['permission_id'] as $key => $value) {
            $permissionrole=new PermissionRole();
            $permissionrole->permission_id=$value;
            $permissionrole->role_id=$id;
            $permissionrole->save();
        }
        $inputs=$request->all();
        $role->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Role updated successfully.'
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
        Role::destroy($id);
        PermissionRole::where('role_id',$id)->delete();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Role deleted successfully.'
            ]);
    }
}
