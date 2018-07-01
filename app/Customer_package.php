<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_package extends Model
{
    protected $fillable=[
    	'payment_id','payment_request_id','customer_id','package_id','image','title','description','duration','pricing',
    ];
}
