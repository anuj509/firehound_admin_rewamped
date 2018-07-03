<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;
use App\RoleUser;
use App\Role;
use App\Permission;
use App\PermissionRole;
use App\Ticket;
use App\Package;
use App\Customer;
use App\Device;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin');
        $this->middleware('clearance',['except'=>['getSupport','dashboard','getPermissions']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::all('id','name','email')->sortByDesc("created_at");
        foreach ($admins as $key => $admin) {
            $roleuser=RoleUser::where('user_id',$admin->id)->first();
            if(count($roleuser->toArray())>0){
            $role=Role::where('id',$roleuser->role_id)->first();
                if($role->id!='4'){
                    unset($admins[$key]);
                }else{
                    $devices=Device::where('admin_id',$admin->id)->get()->toArray();
                    if(count($devices)>0){
                        $admins[$key]['devices']=implode(",",array_column($devices,'name'));
                    }else{
                        $admins[$key]['devices']='No Devices';
                    }
                    $admins[$key]['role_id']=$role->id;
                    $admins[$key]['rolename']=$role->display_name;
                }
            }else{
            $admins[$key]['role_id']='-1';
            $admins[$key]['rolename']='Unassigned';    
            }
        }
        // $usersonline = Tracker::onlineUsers(); // defaults to 3 minutes
        // //print_r($usersonline->toArray());
        // foreach ($usersonline as $key => $useronline) {
        // echo $useronline['user']['fullname'].'<br>';    
        // }
        
        return response()->json($admins);
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
        if($request['password']!=$request['cnf-password']){
            return response()->json([
            'msgtype'=>'error',
            'body'=>'password and confirm field does not match.'
            ]);
        }
        $request->merge(array('password'=>bcrypt($request['password'])));
        $request->offsetUnset('cnf-password');
        $roleuser=new RoleUser(['user_id'=>'','role_id'=>'4']);
        $admin=new Admin($request->all());
        try{
            $admin->save();
            $roleuser->user_id=$admin->id;
            $roleuser->save();
            $device_ids=$request->input('device_id');
            if(count($device_ids)>0)
            foreach ($device_ids as $key => $device_id) {
                $device=Device::find($device_id);
                $device->admin_id=$admin->id;
                $device->save();
            }
            return response()->json([
            'msgtype'=>'success',
            'body'=>'User created successfully.'
            ]);
        }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            return response()->json([
            'msgtype'=>'error',
            'body'=>'User creation failed.error '.$errorCode
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
        $admin=Admin::where('id',$id)->get(['id','name','email'])->first();
        return response()->json($admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::where('id',$id)->get(['id','name','email'])->first();
        $devices=Device::where('admin_id',$admin->id)->get()->toArray();
        if(count($devices)>0){
            $admin['device_id[]']=array_column($devices,'id');
        }
        $roleuser=RoleUser::where('user_id',$admin->id)->first();
        if(count($roleuser)>0){
        $role=Role::where('id',$roleuser->role_id)->first();
        $admin['role_id']=$role->id;
        $admin['rolename']=$role->display_name;
        }
        return response()->json($admin);
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
        $admin=Admin::find($id);
        $request->merge(array('password'=>bcrypt($request['password'])));
        $request->offsetUnset('cnf-password');
        // $roleuser=RoleUser::where('user_id',$admin->id)->first();
        // if(count($roleuser)>0){
        // RoleUser::where('user_id',$admin->id)->update(['role_id'=>$request['role_id']]);
        // $request->offsetUnset('role_id');
        // }else{
        //   $reassign=new RoleUser([
        //   'user_id'=>$id,
        //   'role_id'=>$request['role_id']
        //   ]);  
        //   $reassign->save();
        // }
        $device_ids=$request->input('device_id');
        if(count($device_ids)>0)
        foreach ($device_ids as $key => $device_id) {
            $device=Device::find($device_id);
            $device->admin_id=$admin->id;
            $device->save();
        }
        $inputs=$request->all();
        $admin->update($inputs);
        return response()->json([
            'msgtype'=>'success',
            'body'=>'Admin User updated successfully.'
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
        Admin::destroy($id);
        RoleUser::where('user_id',$id)->delete();
        return response()->json([
            'msgtype'=>'success',
            'body'=>'User deleted successfully.'
            ]);   
    }

    public function getSupport(Request $request)
    {
        $admins=Admin::whereHas('role' , function($query) { $query->where('name','support'); })->get();
        return response()->json($admins);
    }

    public function getPermissions()
    {
      $admin=Admin::where('id',Auth::guard('admin')->User()->id)->with('role')->first();
      $permissions_ids=array_column(PermissionRole::where('role_id',$admin->role['role_id'])->get()->toArray(),"permission_id");
      $permissions=array_column(Permission::whereIn('id',$permissions_ids)->get()->toArray(), 'name');
      return $permissions;
    }

    public function dashboard(Request $request)
    {
      $permissions=$this->getPermissions();
      //print_r($permissions);
      $sidenav='';
    //   $sidenav='<li><a href="/admin/home" class="collapsible-header waves-effect">DashBoard</a></li>';
    //   if(in_array('viewadmins', $permissions) || in_array('viewroles', $permissions) || in_array('viewpermissions', $permissions)){
    //     $sidenav.='<li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-table"></i> User Management<i class="fa fa-angle-down rotate-icon"></i></a> <div class="collapsible-body"> <ul>';
    //   }
    //   if(in_array('viewadmins', $permissions)){
    //     $sidenav.='<li><a class="waves-effect" onclick="admins()"><i class="fa fa-users"></i> Maintainers</a>
    //                             </li>';
    //   }                          
    //   if(in_array('viewroles', $permissions)){
    //     $sidenav.='<li><a class="waves-effect" onclick="roles()"><i class="fa fa-table"></i> Role</a>
    //                             </li>';
    //   }                          
    //   if(in_array('viewpermissions', $permissions)){
    //     $sidenav.='<li><a class="waves-effect" onclick="permissions()"><i class="fa fa-table"></i> Permissions</a></li>';
    //     }
    //   if(in_array('viewadmins', $permissions) || in_array('viewroles', $permissions) || in_array('viewpermissions', $permissions)){
    //     $sidenav.='</ul>
    //                     </div>
    //                 </li>';
    //   }                            
        if(in_array('viewadmins', $permissions)){
            $sidenav.='<li><a class="collapsible-header waves-effect" onclick="admins()"><i class="fa fa-users"></i> Maintainers</a></li>';
        }
        // if(in_array('viewcustomers', $permissions)){
        //     $sidenav.='<li><a class="collapsible-header waves-effect" onclick="customers()"><i class="fa fa-users"></i> Customers</a></li>';
        // }
        // if(in_array('viewsliders', $permissions)){
        //     $sidenav.='<li><a class="collapsible-header waves-effect" onclick="sliders()"><i class="fa fa-film"></i> Sliders</a></li>';
        // }
        // if(in_array('viewguides', $permissions)){
        //     $sidenav.='<li><a class="collapsible-header waves-effect" onclick="guides()"><i class="fa fa-book"></i> Guides</a></li>';
        // }
        // if(in_array('viewtypes', $permissions)){
        //     $sidenav.='<li><a class="collapsible-header waves-effect" onclick="types()"><i class="fa fa-tag"></i> Types</a></li>';
        // }
        // if(in_array('viewpackages', $permissions)){
        //     $sidenav.='<li><a class="collapsible-header waves-effect" onclick="packages()"><i class="fa fa-list"></i> Packages</a></li>';
        // }
        // if(in_array('viewblogs', $permissions)){
        //     $sidenav.='<li><a class="collapsible-header waves-effect" onclick="blogs()"><i class="fa fa-list"></i> Blogs</a></li>';
        // }
        // if(in_array('viewtickets', $permissions)){
        //     $sidenav.='<li><a class="collapsible-header waves-effect" onclick="tickets()"><i class="fa fa-list"></i> Tickets</a></li>';
        // }
        // if(in_array('viewservices', $permissions)){
        //     $sidenav.='<li><a class="collapsible-header waves-effect" onclick="services()"><i class="fa fa-list"></i> Services</a></li>';
        // }
        // if(in_array('viewstates', $permissions) || in_array('viewmarketplaces', $permissions) || in_array('viewmonthlysales', $permissions) || in_array('viewfulfillments', $permissions) || in_array('viewcategoriesdeals', $permissions)){
        // $sidenav.='<li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-table"></i> Configuration<i class="fa fa-angle-down rotate-icon"></i></a> <div class="collapsible-body"> <ul>';
        // }
        // if(in_array('viewstates', $permissions)){
        // $sidenav.='<li><a class="waves-effect" onclick="states()"><i class="fa fa-flag"></i> States</a>
        //                         </li>';
        // }                          
        // if(in_array('viewmarketplaces', $permissions)){
        // $sidenav.='<li><a class="waves-effect" onclick="marketplaces()"><i class="fa fa-table"></i> MarketPlaces</a>
        //                         </li>';
        // }
        // if(in_array('viewmonthlysales', $permissions)){
        // $sidenav.='<li><a class="waves-effect" onclick="monthlysales()"><i class="fa fa-table"></i> MonthlySales</a>
        //                         </li>';
        // }
        // if(in_array('viewfulfillments', $permissions)){
        // $sidenav.='<li><a class="waves-effect" onclick="fulfillments()"><i class="fa fa-table"></i> FulFillment</a>
        //                         </li>';
        // }
        // if(in_array('viewcategoriesdeals', $permissions)){
        // $sidenav.='<li><a class="waves-effect" onclick="categoriesdeals()"><i class="fa fa-table"></i> CategoriesDeals</a>
        //                         </li>';
        // }
        // if(in_array('viewstates', $permissions) || in_array('viewmarketplaces', $permissions) || in_array('viewmonthlysales', $permissions) || in_array('viewfulfillments', $permissions) || in_array('viewcategoriesdeals', $permissions)){
        // $sidenav.='</ul>
        //                 </div>
        //             </li>';
        // }
        if(in_array('viewdevices', $permissions)){
            $sidenav.='<li><a class="collapsible-header waves-effect" onclick="devices()"><i class="fa fa-list"></i> Devices</a></li>';
        }
        if(in_array('viewupdates', $permissions)){
            $sidenav.='<li><a class="collapsible-header waves-effect" onclick="updates()"><i class="fa fa-list"></i> Updates</a></li>';
        }
        $tickets_r=Ticket::where('status','raised')->count();
        $tickets=Ticket::count();
        if($tickets>0){
        $ticketpercent=100-((intval($tickets_r)/intval($tickets))*100);
        }else{
        $ticketpercent=0;    
        }
        $customers=Customer::count();
        $getusertoday = Customer::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();
        if($customers>0){
        $customerpercent=100-((intval($getusertoday)/intval($customers))*100);
        }else{
            $customerpercent=0;
        }
        $packages=Package::count();   
        //$usersOnline = Tracker::onlineUsers(60*1);
        $cards='<section class="mt-lg-5">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-xl-3 col-md-6 mb-r">

                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa fa-money primary-color"></i>
                                <div class="data">
                                    <p>Tickets</p>
                                    <h4 class="font-bold dark-grey-text">'.$tickets.'</h4>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: '.$ticketpercent.'%" aria-valuenow="'.$ticketpercent.'" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text">Better than last week ('.$ticketpercent.'%)</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-xl-3 col-md-6 mb-r">

                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa fa-line-chart warning-color"></i>
                                <div class="data">
                                    <p>Customers</p>
                                    <h4 class="font-bold dark-grey-text">'.$customers.'</h4>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar red accent-2" role="progressbar" style="width: '.$customerpercent.'%" aria-valuenow="'.$customerpercent.'" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text">Worse than last week ('.$customerpercent.'%)</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-xl-3 col-md-6 mb-r">

                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa fa-pie-chart light-blue lighten-1"></i>
                                <div class="data">
                                    <p>Packages</p>
                                    <h4 class="font-bold dark-grey-text">'.$packages.'</h4>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar red accent-2" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text">Worse than last week (75%)</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-xl-3 col-md-6 mb-r">

                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa fa-bar-chart red accent-2"></i>
                                <div class="data">
                                    <p>RealTime Customers</p>
                                    <h4 class="font-bold dark-grey-text">'.count(array(1,2)).'</h4>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text">Better than last week (25%)</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>';      
       //$trackerAgents=TrackerAgent::all()->pluck(`browser`,`browser_version`)->toArray();
       //SELECT `browser`,`browser_version`,COUNT(`browser`) as 'visits' FROM `tracker_agents` GROUP BY `browser`
       //$trackerAgents=DB::table('tracker_agents')->select('browser','browser_version',DB::raw('count(\'browser\') as visits'))->groupBy('browser')->get()->toArray();    
       // echo '<pre>';
       // print_r($trackerAgents);
       // echo '</pre>';


       // foreach ($trackerAgents as $key => $value) {
       //     echo $value->browser.' '.$value->browser_version.' '.$value->visits.'<br>';
       // }
       //$usersOnline = Tracker::onlineUsers();
        // foreach ($usersOnline as $key => $useronline) {
        // echo $useronline['user']['fullname'].'<br>';    
        // }
       //print_r($usersOnline->toArray());
      return view('admin.home',compact('sidenav','cards','trackerAgents','usersOnline'));
    }
}
