<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\PackageType;
use App\Type;
class PackageController extends Controller
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
        $packages=Package::all('id','image','title','description','badge','duration','startdate','starttime','enddate','endtime','pricing')->sortByDesc("created_at");
        foreach ($packages as $key => $package) {
            $packagetypes=PackageType::where('package_id',$package->id)->get();
            if(count($packagetypes)>0){
                $typeids=array();
                foreach ($packagetypes as $index => $packagetype) {
                    $typeids[]=$packagetype->type_id;
                }
                $types=Type::whereIn('id',$typeids)->get();
                if(count($types)>0){
                    $typesStr=implode(',', array_map(function($x) { return $x['name']; }, $types->toArray()));
                }
            $packages[$key]['type_id']=$typeids;
            $packages[$key]['name']=$typesStr;    
            }else{
            $packages[$key]['type_id']='-1';
            $packages[$key]['name']='Unassigned';    
            }
            $packages[$key]['startdatetime']=$packages[$key]['startdate'].' '.$packages[$key]['starttime'];
            $packages[$key]['enddatetime']=$packages[$key]['enddate'].' '.$packages[$key]['endtime'];
            unset($packages[$key]['startdate']);
            unset($packages[$key]['starttime']);
            unset($packages[$key]['enddate']);
            unset($packages[$key]['endtime']);
        }
        return response()->json($packages);
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
        $type_ids=$request['type_id'];
        $request->offsetUnset('type_id');
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
        $package=new Package($request->all());
        //print_r($request->input());
        try{
            $package->save();
            foreach ($type_ids as $key => $type_id) {
                $packagetype=new PackageType([
                    'package_id'=>$package->id,
                    'type_id'=>$type_id
                ]);
                $packagetype->save();
            }
            return response()->json([
            'msgtype'=>'success',
            'body'=>'Package created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Package creation failed.error '.$errorCode
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
        $package=Package::find($id);
        $packagetypes=PackageType::where('package_id',$id)->get();
        if(count($packagetypes)>0){
            $typeids=array();
                foreach ($packagetypes as $index => $packagetype) {
                    $typeids[]=$packagetype->type_id;
                }
                $types=Type::whereIn('id',$typeids)->get();
                if(count($types)>0){
                    $typesStr=implode(',', array_map(function($x) { return $x['name']; }, $types->toArray()));
                }
            $package['type_id[]']=$typeids;
            $package['name']=$typesStr;
        }
        else
        {
            $package['type_id[]']='-1';
            $package['name']='Unassigned';    
        }
        return response()->json($package);
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
        $package=Package::find($id);
        $packagetype=PackageType::where('package_id',$package->id)->delete();
        foreach ($request['type_id'] as $key => $value) {
            $packagetype=new PackageType();
            $packagetype->type_id=$value;
            $packagetype->package_id=$id;
            $packagetype->save();
        }
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
        $package->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Package updated successfully.'
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
     
        $package=Package::find($id);
        $package->delete();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Package deleted successfully.'
            ]);
    
    }
}
