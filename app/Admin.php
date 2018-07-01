<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;
class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

    public function role()
    {
        return $this->hasOne(RoleUser::class,'user_id');
    }
    
    // public function withRole($role)
    // {
    //     return $this->role()->where('name', $role)->get();
    // }

    // public function hasRole($role)
    // {
    //     if ($this->role()->where('name', $role)->first()) {
    //       return true;
    //     }else{
    //       return false;  
    //     }
    // }

    // public function getRole()
    // {
    //     return $this->role()->first();
    // }

    public function permissions()
    {
        return app('App\Http\Controllers\Admin\AdminController')->getPermissions();
    }

    public function hasPermission($permission)
    {
        //print_r($this->permissions());
        $permissions=$this->permissions();
        return in_array($permission, $permissions);
    }

}
