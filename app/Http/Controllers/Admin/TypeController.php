<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use App\Guide;
use App\TypeGuide;
class TypeController extends Controller
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
        $types=Type::all('id','name')->sortByDesc("created_at");
        foreach ($types as $key => $type) {
            $typeguides=TypeGuide::where('type_id',$type->id)->get();
            if(count($typeguides)>0){
                $guideids=array();
                foreach ($typeguides as $index => $typeguide) {
                    $guideids[]=$typeguide->guide_id;
                }
                $guides=Guide::whereIn('id',$guideids)->get();
                if(count($guides)>0){
                    $guidesStr=implode(',', array_map(function($x) { return $x['name']; }, $guides->toArray()));
                }
            $types[$key]['guide_id']=$guideids;
            $types[$key]['guidename']=$guidesStr;    
            }else{
            $types[$key]['guide_id']='-1';
            $types[$key]['guidename']='Unassigned';    
            }
        }
        return response()->json($types);
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
        $guide_ids=$request['guide_id'];
        $request->offsetUnset('guide_id');
        $type=new Type($request->all());
        try{
            $type->save();
            foreach ($guide_ids as $key => $guide_id) {
                $typeguide=new TypeGuide([
                    'type_id'=>$type->id,
                    'guide_id'=>$guide_id
                ]);
                $typeguide->save();
            }
            return response()->json([
            'msgtype'=>'success',
            'body'=>'Guide Type created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Guide Type creation failed.error '.$errorCode
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type=Type::find($id);
        $typeguides=TypeGuide::where('type_id',$id)->get();
        if(count($typeguides)>0){
            $guideids=array();
                foreach ($typeguides as $index => $typeguide) {
                    $guideids[]=$typeguide->guide_id;
                }
                $guides=Guide::whereIn('id',$guideids)->get();
                if(count($guides)>0){
                    $guidesStr=implode(',', array_map(function($x) { return $x['name']; }, $guides->toArray()));
                }
            $type['guide_id[]']=$guideids;
            $type['guidename']=$guidesStr;
        }
        else
        {
            $type['guide_id[]']='-1';
            $type['guidename']='Unassigned';    
        }
        return response()->json($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //print_r($request->input());
        $type=Type::find($id);
        $typeguide=TypeGuide::where('type_id',$type->id)->delete();
        foreach ($request['guide_id'] as $key => $value) {
            $typeguide=new TypeGuide();
            $typeguide->guide_id=$value;
            $typeguide->type_id=$id;
            $typeguide->save();
        }
        $inputs=$request->all();
        $type->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'GuideType updated successfully.'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type::destroy($id);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'GuideType deleted successfully.'
            ]);
    }
}
