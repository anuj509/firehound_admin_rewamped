<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Customer_package;
use Carbon\Carbon;
use App\PackageType;
Use App\Type;
use App\TypeGuide;
use App\Guide;
class CustomerController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['auth:admin','clearance'])->except('packages');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all('id','fullname','email','contact','address','state','pincode','isEmailVerified','isContactVerified')->sortByDesc("created_at");
        foreach ($customers as $key => $customer) {
            $customers[$key]['address']=$customers[$key]['address'].','.$customers[$key]['state'].','.$customers[$key]['pincode'].'.';
            $customers[$key]['isEmailVerified']=($customers[$key]['isEmailVerified']=='1')? 'Verified':'Not Verified';
            $customers[$key]['isContactVerified']=($customers[$key]['isContactVerified']=='1')? 'Verified':'Not Verified';
            unset($customers[$key]['state']);
            unset($customers[$key]['pincode']);
        }
        return response()->json($customers);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function packages(Request $request,$id)
    {
       //echo $id; 
       //print_r($request);
       try{ 
        $customerpackages=Customer_package::where('customer_id',$id)->get();
        $activepackages=array();
        $pastpackages=array();
        foreach ($customerpackages as $key => $package) {
           $packagetypes=PackageType::where('package_id',$package->package_id)->get();
            if(count($packagetypes)>0){
                $typeids=array();
                $guidesbag=array();
                foreach ($packagetypes as $index => $packagetype) {
                    $typeids[]=$packagetype->type_id;
                    $typeguides=TypeGuide::where('type_id',$packagetype->type_id)->get();
                    
                    if(count($typeguides)>0){
                        $guideids=array();
                        foreach ($typeguides as $k => $typeguide) {
                            $guideids[]=$typeguide->guide_id;
                        }
                        $guides=Guide::whereIn('id',$guideids)->get();
                        $guideidsarr[]=$guideids;
                        if(count($guides)>0){
                            $guidesStr=array_column($guides->toArray(), 'name');
                        }
                    }
                    $guidesbag[]=json_encode($guidesStr);
                }
                $types=Type::whereIn('id',$typeids)->get();
                $typeidsarr[]=$typeids;
                if(count($types)>0){
                    $typesStr=array_column($types->toArray(), 'name');
                }
            $customerpackages[$key]['guide_id']=$guideidsarr;
            $customerpackages[$key]['guides']=$guidesbag;    
            $customerpackages[$key]['type_id']=$typeidsarr;
            $customerpackages[$key]['name']=json_encode($typesStr);    
            }else{
            $customerpackages[$key]['type_id']='-1';
            $customerpackages[$key]['name']=json_encode(array('Unassigned'));    
            }
             
          

          $package_duration=intval($package->duration);
          $duration_in_seconds=$package_duration*24*60*60;
          $now = new Carbon();
          $created_at=Carbon::parse($package->created_at);
          $end_date=$created_at->copy()->addSeconds($duration_in_seconds);
          $expirydate=$created_at->copy()->addDays(30);
          //echo "created :".$created_at;
          //echo "end :".$expirydate;
          if(!$now->gt($end_date)){
            $pastpackages[]=$customerpackages[$key];
          }else{
            $activepackages[]=$customerpackages[$key];
          }  
        }
        return response()->json([$pastpackages,$activepackages]);
       }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Something went Wrong.error '.$errorCode
            ]);
        } 
    }
}
