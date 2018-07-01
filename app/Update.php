<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Update extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['device_id','buildversion','ziplink','changelog','xdathread'];
}
