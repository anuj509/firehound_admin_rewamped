<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Slider;
use App\Customer_package;
use App\State;
use App\Marketplace;
use App\Monthly_sale;
use App\Fulfillment;
use App\Categories_deal;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index(Request $request)
    {
    	$navrightitem=$this->navrightitem($request);
        $customerpackage_ids=array();
        if ($request->session()->has('customersession')) {
            $customersession=session('customersession');
            $customerpackage=Customer_package::where('customer_id',$customersession->id)->get();
            if(count($customerpackage)>0){
                $customerpackage_ids=array_column($customerpackage->toArray(), 'package_id');
            }
        }
        $packages=Package::all();
        $sliders=Slider::where('isActive','yes')->get();
        //print_r($packages->toArray());
        foreach ($packages as $key => $package) {
          //echo $package->startdate.' '.$package->starttime;
          $formattedTime=$this->convertOddTimeFormat($package->startdate,$package->starttime);
          $convertedTime=Carbon::parse($formattedTime);
          //echo $convertedTime;
          $twoDayLaterTime=$convertedTime->copy()->addDays(2);
          //echo $twoDayLaterTime;
          //$dummydate=Carbon::create(2018,02,25,0,50,7,'Asia/Kolkata');
          $now=Carbon::now('Asia/Kolkata');
          //echo $dummydate." # ".$now;
          if($now->gte($twoDayLaterTime)==1){
            $packages[$key]['badge']='old';
          }
          //echo "<br>";
          //now starting with package start and end
          $packagestart=Carbon::parse($this->convertOddTimeFormat($package->startdate,$package->starttime));
          $packageend=Carbon::parse($this->convertOddTimeFormat($package->enddate,$package->endtime));
          if(!($now->between($packagestart,$packageend))){
            //echo 'out of time';
            $packages=$packages->forget($key);
          }

        }
        return view('landing',compact('navrightitem','packages','sliders','customerpackage_ids'));
    }

    public function navrightitem(Request $request)
    {
    	$navrightitem='<button type="button" class="btn blue-gradient btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#modalLRForm">Login / Register</button>';
    	if ($request->session()->has('customersession')) {
    		$customer=session('customersession');
            //print_r($customer);
            $navrightitem='<div class="btn-group">
                            <button class="btn blue-gradient btn-rounded waves-effect waves-light  dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$customer->fullname.'</button>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/me">My Space</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </div>';
        }
        return $navrightitem;
    }
    public function userpackages(Request $request)
    {
        $customerpackage_ids=array();
        if ($request->session()->has('customersession')) {
            $customersession=session('customersession');
            //print_r($customer);

            $customerpackages=Customer_package::where('customer_id',$customersession->id)->get();
            if(count($customerpackages)>0){
                $customerpackage_ids=array_column($customerpackages->toArray(), 'package_id');
            }
        }
        return $customerpackage_ids;
    }
    public function getstates(Request $request)
    {
        $states=State::all('name')->toArray();
        $states=array_column($states,'name');
        return $states;
    }
    public function getmarketplaces(Request $request)
    {
        $marketplaces=Marketplace::all('name')->toArray();
        $marketplaces=array_column($marketplaces,'name');
        return $marketplaces;
    }
    public function getmonthlysales(Request $request)
    {
        $monthlysales=Monthly_sale::all('name')->toArray();
        $monthlysales=array_column($monthlysales,'name');
        return $monthlysales;
    }
    public function getfulfillments(Request $request)
    {
        $fulfillments=Fulfillment::all('name')->toArray();
        $fulfillments=array_column($fulfillments,'name');
        return $fulfillments;
    }
    public function getcategoriesdeals(Request $request)
    {
        $categoriesdeals=Categories_deal::all('name','isGroupHeader')->toArray();
        //$categoriesdeals=array_column($categoriesdeals,'name');
        return $categoriesdeals;
    }

    public function convertOddTimeFormat($startdate,$starttime)
    {
        $date=explode(" ",$startdate);
        $newtimestr=substr($starttime, 0,5).' '.substr($starttime, 5,2);
        //echo "new str:".$newtimestr;
        $time=date("H:i:s", strtotime($newtimestr));
        switch ($date[1]) {
            case 'January,':
                $date[1]=1;
                break;
            case 'February,':
                $date[1]=2;
                break;
            case 'March,':
                $date[1]=3;
                break;
            case 'April,':
                $date[1]=4;
                break;
            case 'May,':
                $date[1]=5;
                break;
            case 'June,':
                $date[1]=6;
                break;
            case 'July,':
                $date[1]=7;
                break;
            case 'August,':
                $date[1]=8;
                break;
            case 'September,':
                $date[1]=9;
                break;
            case 'October,':
                $date[1]=10;
                break;
            case 'November,':
                $date[1]=11;
                break;
            case 'December,':
                $date[1]=12;
                break;
        }
        return $date[2].'-'.$date[1].'-'.$date[0].' '.$time;
    }
}
