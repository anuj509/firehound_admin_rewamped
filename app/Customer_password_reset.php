<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_password_reset extends Model
{
    protected $fillable=['email','token','created_at'];
    public $timestamps = false;
}
