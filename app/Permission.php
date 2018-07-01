<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;
class Permission extends Model
{
    protected $fillable=['id','name','display_name','description'];

    public function permissions()
    {
    	return $this->belongsToMany(Role::class);
    }
}
