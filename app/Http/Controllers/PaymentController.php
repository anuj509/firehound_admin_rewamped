<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Customer_package;
use App\Customer;
class PaymentController extends Controller
{
    public function buy(Request $request)
    {	
    	if (!$request->session()->has('customersession')) {
            return ['success'=>'login','msgbody'=>'please Login to continue.'];
        }
    	if(!$request->has('package_id')){
    		return ['success'=>'error','msgbody'=>'soemthing went wrong!'];
    	}

    	//print_r($request->input());
    	$customersession=session('customersession');
    	//print_r($customersession);
    	$package=Package::find($request['package_id']);
    	$customer_package=Customer_package::where('customer_id',$customersession->id)->where('package_id',$package->id)->first();
    	if(count($customer_package)>0){
    		return ['success'=>'error','msgbody'=>'Package Already Purchased.'];
    	}
    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER,
		            array("X-Api-Key:test_cb78b833e41bab3cf1a0e2d3550",
		                  "X-Auth-Token:test_0e751d84b6403dbf800a1e566b2"));
		$payload = Array(
		    'purpose' => $package->title,
		    'amount' => $package->pricing,
		    'phone' => $customersession->contact,
		    'buyer_name' => $customersession->fullname,
		    'redirect_url' => 'http://assistecho.com/redirect/',
		    'send_email' => false,
		    'webhook' => 'http://assistecho.com/webhook',
		    'send_sms' => false,
		    'email' => $customersession->email,
		    'allow_repeated_payments' => false
		);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
		$response = curl_exec($ch);
		curl_close($ch); 
		$res=json_decode($response,true);
		//print_r($res);
		return ['success'=>$res['success'],'data'=>$res['payment_request']['longurl']];

    }


    public function redirect(Request $request)
    {
    	//print_r($request->toArray());
        return redirect('/')->with($request->toArray()); 
    }


    public function webhook(Request $request)
    {
  //   	print_r($request->toArray());
  //   	$myfile = fopen("pgsummary.txt", "a+") or die("Unable to open file!");
		// fwrite($myfile, print_r($request->toArray(),true));
		// fclose($myfile);
		$package_name=$request['purpose'];
		$package=Package::where('title',$package_name)->first();
		$customer=Customer::where('email',$request['buyer'])->first();
		$customer_package=new Customer_package([
			'payment_id'=>$request['payment_id'],
			'payment_request_id'=>$request['payment_request_id'],
			'customer_id'=>$customer->id,
			'package_id'=>$package->id,
			'image'=>$package->image,
			'title'=>$package->title,
			'description'=>$package->description,
			'duration'=>$package->duration,
			'pricing'=>$package->pricing
		]);
		$customer_package->save();
		return response()->json(["true"]);
    }
}
