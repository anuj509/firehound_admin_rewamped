<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class clearance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $deniedmsg=['error' => 'Not authorized.'];
        //print_r(Auth::guard('admin')->user());
        //echo Auth::guard('admin')->user()->id;
        //Auth::guard('admin')->user()->hasRole('superadmin')
        //print_r($request->path());
        //print_r(Auth::guard('admin')->user()->role()->first());
        //echo (Auth::guard('admin')->user()->role()->first()->name);
        //$role=Auth::guard('admin')->user()->role()->first()->name;
        //print_r(Auth::guard('admin')->user()->hasPermission('viewsliders'));

        $path=explode('/',$request->path());    
        $module=$path[1];

        //echo $module;

        if($request->is('admin/'.$module) && $request->isMethod('get')){
            if(Auth::guard('admin')->user()->hasPermission('view'.$module)){
                return $next($request);
            }else{
                return response()->json($deniedmsg);
            }
        }else if($request->is('admin/'.$module) && $request->isMethod('post')){
            if(Auth::guard('admin')->user()->hasPermission('create'.$module)){
                return $next($request);
            }else{
                return response()->json($deniedmsg);
            }
        }else if(($request->is('admin/'.$module.'/*/update') && $request->isMethod('post'))||($request->is('admin/'.$module.'/*') && $request->isMethod('get'))){
            if(Auth::guard('admin')->user()->hasPermission('edit'.$module)){
                return $next($request);
            }else{
                return response()->json($deniedmsg);
            }
        }else if($request->is('admin/'.$module.'/*/destroy') && $request->isMethod('post')){
            if(Auth::guard('admin')->user()->hasPermission('delete'.$module)){
                return $next($request);
            }else{
                return response()->json($deniedmsg);
            }
        }
        else{
        return response()->json($deniedmsg);
        }        
        
    }
}
