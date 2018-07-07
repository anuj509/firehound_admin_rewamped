<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;
use App\Admin;
use Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function apiLoginCheck($data)
    {
        if(count(Admin::where('email',$data['email'])->get()->toArray())>0){
            $user = Admin::where('email',$data['email'])->first();
            if(Hash::check($data['password'], $user->password)){
                return true;
            }
            //echo "password".count(Admin::where('email',$data['email'])->where('password',$hashed_pass)->first());    
            return false;
        }
        //echo "email not exists";
        return false;
    }

    public function loginApi(Request $request)
    {
        //print_r($request->input());
        $email=$request->input('email');
        $password=$request->input('password');
        //print_r($this->apiLoginCheck(['email' => $email, 'password' => $password]));
        if ($this->apiLoginCheck(['email' => $email, 'password' => $password]))
        {   
            $token=$this->generateRandomString(16);
            $user = Admin::where('email',$email)->first();
            $user->apitoken=$token;
            $user->save();
            return response()->json(['status'=>'success','token'=>$token]);
        }else{
            return response()->json(['status'=>'false','token'=>'0']);
        }
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
