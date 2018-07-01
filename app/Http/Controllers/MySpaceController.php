<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Customer_company_detail;
use App\Blog;
use App\Guide;
use App\TypeGuide;
use App\Type;
use App\Ticket;
use App\PackageType;
class MySpaceController extends Controller
{
    public function profile(Request $request)
    {
    	if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
    	$customersession=session('customersession');
    	$customer=Customer::find($customersession->id);
    	$company_detail=Customer_company_detail::where('customer_id',$customersession->id)->first();
    	return view('profile',compact('customer','company_detail'));
    }

    public function blogs(Request $request)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $blogs=Blog::all()->sortByDesc("created_at");
        $blogs_menuitem=Blog::limit(3)->get();
        $guides_menuitem=Guide::limit(3)->get();
        return view('blogs',compact('blogs','blogs_menuitem','guides_menuitem'));
    }
    public function blog(Request $request,$id)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $blog=Blog::find($id);
        return response()->json($blog);
    }

    public function guides(Request $request)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $guides=Guide::all()->sortByDesc("created_at");
        $guides->map(function ($guide) {
            $type_id=TypeGuide::where('guide_id',$guide->id)->first();
            
            if(count($type_id)>0)
            {
                //print_r($type_id->toArray());
                $type=Type::where('id',$type_id->type_id)->first();
                // if(count($type)>0){
                //     print_r($type);
                // }else{
                //     echo "unavailable";
                // }
                $guide['type']=$type->name;
            }else{
                $guide['type'] = 'miscellaneous';
            }
            return $guide;
        });
        $blogs_menuitem=Blog::limit(3)->get();
        $guides_menuitem=Guide::limit(3)->get();
        //print_r($guides->toArray());
        return view('guides',compact('guides','blogs_menuitem','guides_menuitem'));
    }
    // public function guide(Request $request,$id)
    // {
    //     if (!$request->session()->has('customersession')) {
    //         return redirect('/');
    //     }
    //     $guide=Guide::find($id);
    //     return response()->json($guide);
    // }

    public function showguide(Request $request,$id)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $guide=Guide::find($id);
        $blogs_menuitem=Blog::limit(3)->get();
        $guides_menuitem=Guide::limit(3)->get();
        return view('showguide',compact('guide','blogs_menuitem','guides_menuitem'));
    }

    public function tickets(Request $request)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $customersession=session('customersession');
        $tickets=Ticket::where('created_by',$customersession->email)->where('usertype','customers')->get(['id','title','status','description','type','assigned_to'])->sortByDesc("created_at")->toArray();
        $blogs_menuitem=Blog::limit(3)->get();
        $guides_menuitem=Guide::limit(3)->get();
        return view('tickets',compact('tickets','blogs_menuitem','guides_menuitem'));
    }

    public function storeTicket(Request $request)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $customersession=session('customersession');
        $refnumber=app('App\Http\Controllers\Admin\TicketController')->genWindowId(8);
            while((Ticket::where('refnumber',$refnumber)->get()->count())>0){
                $refnumber=app('App\Http\Controllers\Admin\TicketController')->genWindowId(8);
            }
        $supportmember='unassigned';
        $request->merge(array('assigned_to'=>$supportmember));
        $request->merge(array(
            'refnumber'=>$refnumber,
            'title'=>json_encode(array($request['title'])),
            'status'=>json_encode(array('raised')),
            'description'=>json_encode(array($request['description'])),
            'type'=>json_encode(array($request['type'])),
            'assigned_to'=>json_encode(array($request['assigned_to'])),
            'created_by'=>$customersession->email,
            'usertype'=>'customers'
        ));
        $ticket=new Ticket($request->all());
        try{
        $ticket->save();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Ticket created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'Ticket creation failed.error '.$errorCode
            ]);
        }
    }

    public function verifyContact(Request $request)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $customersession=session('customersession');
        $contact=$customersession->contact;
        $otp=app('App\Http\Controllers\Admin\TicketController')->genWindowId(4);
        //echo "otp:".$otp."<br>";
        $customer=Customer::where('id',$customersession->id)->update(['otp'=>$otp]);
        $ret=file('http://bhashsms.com/api/sendmsg.php?user=techzillaindia&pass=123456&sender=TESTTO&phone='.$customersession->contact.'&text='.urlencode('your OTP is '.$otp).'&priority=ndnd&stype=normal');
        //print_r($ret);
        //$ret=array('S.1432');
        if(strpos($ret[0],'S')==='false'){
            return "error";
        }else{
            return "success";
        }
    }
    public function verifyOTP(Request $request)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $customersession=session('customersession');
        $customer=Customer::where('id',$customersession->id)->first();
        if($request['otp']==$customer->otp){
            $customer->isContactVerified='1';
            $customer->save();
            return "success";
        }else{
            return "error";
        }
    }
    public function packages(Request $request)
    {
        if (!$request->session()->has('customersession')) {
            return redirect('/');
        }
        $customersession=session('customersession');
        $response = app('App\Http\Controllers\Admin\CustomerController')->packages($request,$customersession->id);
        $response = json_decode($response->content(), true);
        //print_r($response);
        $pastpackages=$response[1];
        $activepackages=$response[0];
        $guides_menuitem=Guide::limit(3)->get();
        return view('packages',compact('activepackages','pastpackages','guides_menuitem'));
    }
    public function globalSearch(Request $request)
    {
        $datasource_array = array();
        $index=0;
        if ($request->session()->has('customersession')) {
            $customersession=session('customersession');
            $response = app('App\Http\Controllers\Admin\CustomerController')->packages($request,$customersession->id);
            $response = json_decode($response->content(), true);
            //print_r($response);
            $pastpackages=$response[1];
            $activepackages=$response[0];
            //print_r($response[0]);
            //echo count($response[0]); 
            if(count($response[0])>0){
                $guides=Guide::whereIn('id',array_unique($this->array_flatten($activepackages[0]['guide_id'])))->get();//write custom guides list customer oriented.
            $guides->map(function ($guide) {
                $type_id=TypeGuide::where('guide_id',$guide->id)->first();
                
                if(count($type_id)>0)
                {
                        //print_r($type_id->toArray());
                        $type=Type::where('id',$type_id->type_id)->first();
                        // if(count($type)>0){
                        //     print_r($type);
                        // }else{
                        //     echo "unavailable";
                        // }
                        $guide['type']=$type->name;
                    }else{
                        $guide['type'] = 'miscellaneous';
                    }
                    return $guide;
                });
            }else{
                $packagetypes=PackageType::where('package_id','1')->get();
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
                }                
                $guides=Guide::whereIn('id',array_unique($this->array_flatten($guideidsarr)))->get();//write custom guides list customer oriented.
            $guides->map(function ($guide) {
                $type_id=TypeGuide::where('guide_id',$guide->id)->first();
                
                if(count($type_id)>0)
                {
                        //print_r($type_id->toArray());
                        $type=Type::where('id',$type_id->type_id)->first();
                        // if(count($type)>0){
                        //     print_r($type);
                        // }else{
                        //     echo "unavailable";
                        // }
                        $guide['type']=$type->name;
                    }else{
                        $guide['type'] = 'miscellaneous';
                    }
                    return $guide;
                });
            }
            $tickets=Ticket::where('created_by',$customersession->email)->where('usertype','customers')->get(['id','refnumber','title','status','description','type','assigned_to'])->sortByDesc("created_at")->toArray();
            foreach ($tickets as $ticketarr) {
                $ticket=array();
                foreach ($ticketarr as $key => $value) {
                    $ticket[$key]=is_array(json_decode($value,true))? json_decode($value,true)[0]:$value;
                }
                //print_r($ticket);
                    $datasource_array[$index]['name']=$ticket['title'];
                    $datasource_array[$index]['description']=$ticket['description'].",".$ticket['status'].",".$ticket['type'];
                    $datasource_array[$index]['htmltext']=$this->ticketsTemplate($ticket);
                    
                $index++;
                } 
        }else{
            $customersession=null;
            //$guides=Guide::all()->sortByDesc("created_at");//for guest user with free package.
        }
        $blogs=Blog::all()->sortByDesc("created_at")->toArray();
        foreach ($guides as $key => $value) {
            $datasource_array[$index]['name']=$value['name'];
            $datasource_array[$index]['description']=$value['topics'].",".$value['content'];
            $datasource_array[$index]['htmltext']=$this->guidesTemplate($value);
            $index++;
        }
        foreach ($blogs as $key => $value) {
            $datasource_array[$index]['name']=$value['title'];
            $datasource_array[$index]['description']=$value['content'].",".$value['posted_by'];
            $datasource_array[$index]['htmltext']=$this->blogsTemplate($value);
            $index++;
        }
        //print_r($activepackages);
        //print_r(array_unique($this->array_flatten($activepackages[0]['guide_id'])));
        //print_r($guides);
        //print_r($blogs);
        //print_r($datasource_array);
        return response()->json($datasource_array);
    }

    public function array_flatten($array) { 
      if (!is_array($array)) { 
        return false; 
      } 
      $result = array(); 
      foreach ($array as $key => $value) { 
        if (is_array($value)) { 
          $result = array_merge($result, array_flatten($value)); 
        } else { 
          $result[$key] = $value; 
        } 
      } 
      return $result; 
    }

    public function guidesTemplate($guide)
    {
        return '<div class="list-item box" style="padding: 2%;">        
                                    <!--Grid column-->
                                        <div class="card card-image" style="background-image: url('.$guide['image'].');">
                                            <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4 rounded">
                                                <div class="col-md-12">
                                                    <h6 class="green-text">
                                                        <i class="fa fa-eye"></i>
                                                        <strong class="type"> '.$guide['type'].'</strong>
                                                    </h6>
                                                    <h3 class="py-3 font-bold">
                                                        <strong class="title">'.$guide['name'].'</strong>
                                                    </h3>
                                                    <p class="pb-3 desc">
                                                        Learn about topics : <b>'.implode("</b>,<b>",json_decode($guide['topics'],true)).'</b>
                                                    </p>
                                                    <a class="btn btn-success btn-rounded btn-md" href="/guides/'.$guide['id'].'">
                                                        <i class="fa fa-clone left"></i> View Guide</a>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <!--Grid column-->
                                </div>';
    }

    public function blogsTemplate($blog)
    {
    $max_length = 500;

            if (strlen($blog['content']) > $max_length)
            {
                $offset = ($max_length - 3) - strlen($blog['content']);
                $s = substr($blog['content'], 0, strrpos($blog['content'], ' ', $offset)) . '...';
                $para = $s;
            }else{
                $para = $blog['content'];
            }    
        return '<!--Grid row-->
    <div class="row">

    <!--Grid column-->
    <div class="col-lg-5 col-xl-4 mb-4">
        <!--Featured image-->
        <div class="view overlay hm-white-slight rounded z-depth-1-half">
        <img src="'.$blog['image'].'" class="img-fluid" alt="First sample image">
        <a>
            <div class="mask"></div>
        </a>
        </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
        <h3 class="mb-3 font-bold dark-grey-text">
        <strong class="b_title">'.$blog['title'].'</strong>
        </h3>
        '.$para.'
        <p>by
        <a class="font-bold dark-grey-text">'.$blog['posted_by'].'</a>, '.$blog['created_at'].'</p>
        <a class="btn btn-primary btn-md" data-target="#modalBlog" href="/blogs?blog='.$blog['id'].'">Read more</a>
    </div>
    <!--Grid column-->

    </div>
    <!--Grid row-->';
    }

    public function ticketsTemplate($ticket)
    {
        return '<div class="card card-body">
    <h4 class="card-title">'.$ticket['title'].'</h4>
    <p class="card-text">RefNumber : '.$ticket['refnumber'].'</p>
    <p class="card-text">Status : '.$ticket['status'].'</p>
    <p class="card-text">Description : '.$ticket['description'].'</p>
    <p class="card-text">Type : '.$ticket['type'].'</p>
    <p class="card-text">Assigned To : '.$ticket['assigned_to'].'</p>
    </div>';
    }
}
