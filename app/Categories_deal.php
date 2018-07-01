<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Categories_deal extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable=[
    	'name','isGroupHeader'
    ];
}
