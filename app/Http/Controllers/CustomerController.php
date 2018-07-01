<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Customer_company_detail;
use App\Customer_package;
use Hash;
use Carbon\Carbon;
use App\Blog;
use App\Guide;
use App\Customer_password_reset;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class CustomerController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    // public function __construct()
    // {
    //     $this->middleware('guest')->except(['getLogout','getlogin']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ($request->session()->has('customersession')) {
            return ["warning","Already LoggedIn."];
        }
        //print_r($request->input());
        $request->merge(array('email'=>$request['regemail'],'isEmailVerified'=>0,'isContactVerified'=>0,'password'=>bcrypt($request['password'])));
        $request->offsetUnset('regemail');
        $request->offsetUnset('cnf_password');
        //print_r($request->input());
        $customer=new Customer($request->all());
        try {
            $customer->save();
            $company_detail=new Customer_company_detail([
            'customer_id'=>$customer->id,
            'companyname'=>'',
            'contact'=>'',
            'address'=>'',
            'state'=>'',
            'pincode'=>'',
            'marketplace'=>'',
            'marketplacename'=>'',
            'sales'=>'',
            'fulfillment'=>'',
            'categories_deals'=>'[]'
        ]);
        // $card_detail=new Customer_card_detail([
        //     'customer_id'=>$customer->id,
        //     'name'=>'',
        //     'cardnumber'=>'',
        //     'expirydate'=>'',
        //     'cvv'=>''
        // ]);
            $company_detail->save();
            //$card_detail->save();
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
              return ['error','Duplicate Entry.'];                  
            }
        }

        return ['success','customer details saved.',$customer->id];
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
    public function updateregister(Request $request, $id)
    {
        $customer=Customer::find($id);
        $request->merge(array('email'=>$request['regemail'],'password'=>bcrypt($request['password'])));
        $request->offsetUnset('regemail');
        $request->offsetUnset('cnf_password');
        $inputs=$request->all();
        $customer->update($inputs);
        //print_r($request->input());
        return ['success','customer details Updated.'];
    }
    public function updatecompanydetails(Request $request,$id)
    {
        //print_r($request->input());
        $companydetails=Customer_company_detail::where('customer_id',$id)->first();
        $additional_attr=array('address'=>$request['cmpy_address'],'categories_deals'=>json_encode($request['categories_deals']));
        $additional_attr=$this->checkKeyExists('marketplacename',$request,$additional_attr);
        $additional_attr['categories_deals']=json_encode($request['categories_deals']);
        $request->merge($additional_attr);
        $request->offsetUnset('cmpy_address');
        $inputs=$request->all();
        $companydetails->update($inputs);
        return ['success','company details Updated.'];
    }


    // public function updatecategorydetails(Request $request,$id)
    // {
    //     $carddetails=Customer_card_detail::where('customer_id',$id)->first();
    //     $request->merge(array('name'=>$request['cardholdername']));
    //     $request->offsetUnset('cardholdername');
    //     $inputs=$request->all();
    //     $carddetails->update($inputs);
    //     return ['success','Card details updated.'];
    // }

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

    public function companydetails(Request $request)
    {
        if ($request->session()->has('customersession')) {
            return ["warning","Already LoggedIn."];
        }
        //print_r($request->input());
        $customer_company_detail=Customer_company_detail::where('customer_id',$request['customer_id'])->first();
        $additional_attr=array('address'=>$request['cmpy_address']);
        $additional_attr=$this->checkKeyExists('marketplacename',$request,$additional_attr);
        $additional_attr['categories_deals']=json_encode($request['categories_deals']);
        $request->merge($additional_attr);
        $request->offsetUnset('cmpy_address');
        $inputs=$request->all();
        $customer_company_detail->update($inputs);
        return ['success','Company Information Successfully saved.'];
    }
    // public function categorydetails(Request $request)
    // {
    //     if ($request->session()->has('customersession')) {
    //         return ["warning","Already LoggedIn."];
    //     }
    //     //print_r($request->input());
    //     $customer_company_detail=Customer_company_detail::where('customer_id',$request['customer_id'])->get()->first();
    //     $customer_company_detail->categories_deals=json_encode($request['categories_deals']);
    //     $customer_company_detail->save();
    //     $customer_card_detail=Customer_card_detail::where('customer_id',$id)->first();
    //     $request->merge(array('name'=>$request['cardholdername']));
    //     $request->offsetUnset('categories_deals');
    //     $request->offsetUnset('cardholdername');
    //     $inputs=$request->all();
    //     $customer_card_detail->update($inputs);
    //     $customer_card_detail->save();
    //     return ['success','Registration successfully completed.'];
    // }

    public function checkKeyExists($key,$request,$additional_attr,$json=null)
    {
        if(!array_key_exists($key, $request->input()) && $json!=null){
            $additional_attr[$key]=json_encode(array());
        }else if(!array_key_exists($key, $request->input()) && $json==null){
            $additional_attr[$key]='';
        }
        return $additional_attr;
    }

    public function getlogin(Request $request)
    {   
        //echo "foremost request";
        if ($request->session()->has('customersession')) {
            return ["warning","Already LoggedIn."];
        }
        //echo "received request";
        $customer=Customer::where('email',$request->input('email'))->get();
        $customercount=$customer->count();
        //Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])
        if($customercount>0){
          //echo "exists";
          $customer=Customer::where('email',$request->input('email'))->first();
           if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')], true)){
                  //valid user
                  $request->session()->put('customersession', $customer);
                  return ['success','successfully Logged In.'];
              } else {
                  //invalid user
                  return ['error','invalid credentials.'];
              }
        }else{
        return ['error','invalid credentials.'];
        }
    }

    public function getLogout(Request $request)
    {
        $request->session()->forget('customersession');
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
    public function myspace(Request $request)
    {
        if (!$request->session()->has('customersession')) {
            return redirect()->back();
        }
        $customersession=session('customersession');
        $packages=Customer_package::where('customer_id',$customersession->id)->get();
        if(count($packages)>0)
        foreach ($packages as $key => $package) {
          $package_duration=intval($package->duration);
          $duration_in_seconds=$package_duration*24*60*60;
          $now = new Carbon();
          $created_at=Carbon::parse($package->created_at);
          $end_date=$created_at->copy()->addSeconds($duration_in_seconds);
          $expirydate=$created_at->copy()->addDays(30);
          //echo "created :".$created_at;
          //echo "end :".$expirydate;
          if($now->gt($end_date)){
            unset($packages[$key]);
          }else{
            $totalDuration = $now->diffInSeconds($expirydate);
            $percent= 100-((($totalDuration)/$duration_in_seconds)*100);
            $packages[$key]['progress']=$percent;
          }  
        }
        //print_r($packages);

        $blogs_menuitem=Blog::limit(3)->get();
        $guides_menuitem=Guide::limit(3)->get();

        return view('dashboard',compact('packages','blogs_menuitem','guides_menuitem'));
    }

    public function reset(Request $request)
    {
      //print_r($request->input());
      if ($request->session()->has('customersession')) {
            return ['success'=>'error','msgbody'=>'Logout to reset Password'];
        }
      $customer=Customer::where('email',$request['email'])->first();
      $token=app('App\Http\Controllers\Admin\TicketController')->genWindowId(15,'0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
      $cust_count=Customer_password_reset::where('email',$request['email'])->first();
      if(count($cust_count)>0){
        try{
          $cust_count->where('email',$request['email'])->update(['token'=>$token,'created_at'=>Carbon::now()]);
          return ['success'=>'success','msgbody'=>$token]; 
        }catch(\Illuminate\Database\QueryException $e){
        return ['success'=>'error','msgbody'=>'Something went wrong'];  
        }
      }else{
        $customer_password_reset=new Customer_password_reset([
          'email'=>$request['email'],
          'token'=>$token,
          'created_at'=>Carbon::now()
        ]);
      try{
       $customer_password_reset->save();
        return ['success'=>'success','msgbody'=>$token]; 
      }catch(\Illuminate\Database\QueryException $e){
      return ['success'=>'error','msgbody'=>'Something went wrong'];  
      }
      }
      
      
    }
    public function resetRedirect(Request $request,$token)
    {
     $customer_password_reset=Customer_password_reset::where('token',$token)->first();
     if(count($customer_password_reset)>0){
      return redirect('/reset/password')->with(['token'=>$token,'email'=>$customer_password_reset->email]);
      }
      else{
        return abort(404);
      }
    }
    public function resetRedirectReq(Request $request)
    {
      if($request->session()->has('token') && $request->session()->has('email')){
        return view('auth.passwords.reset')->with(['token'=>$request->session()->get('token'),'email'=>$request->session()->get('email')]);
      }else{
        return abort(404);
      }
    }
    public function resetPassword(Request $request)
    {
      //print_r($request->input());
      $customer_password_reset=Customer_password_reset::where('token',$request['token'])->first();
      //echo count($customer_password_reset);
      //echo $customer_password_reset->email;
      if($request['password'] == $request['repassword']){
        $customer=Customer::where('email',$customer_password_reset->email)->update(['password'=>bcrypt($request['password'])]);
        Customer_password_reset::where('email',$customer_password_reset->email)->delete();
        return ['success'=>'success','msgbody'=>'Updated Successfully.'];
      }else{
        return ['success'=>'error','msgbody'=>'Password and Repeat Password does not match.'];
      }
      //print_r($request->input());
    }
}
