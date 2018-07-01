<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = ['fullname','email','contact','password','address','state','pincode','isEmailVerified','isContactVerified'];
}
