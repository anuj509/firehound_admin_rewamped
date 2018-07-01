<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
class Role extends Model
{
    protected $fillable=['id','name','display_name','description'];

    public function admins()
    {
    	return $this->belongsToMany(Admin::class);
    }

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }
}
