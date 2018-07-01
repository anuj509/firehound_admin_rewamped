<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    protected $table='package_types';
    protected $fillable=['package_id','type_id',];
    public $timestamps = false;
}
