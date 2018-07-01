<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Package extends Model
{
    use SoftDeletes;
    protected $fillable=['image','title','description','badge','duration','startdate','starttime','enddate','endtime','pricing',];
    protected $dates = ['deleted_at'];
}
