<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_card_detail extends Model
{
    protected $fillable = ['customer_id','name','cardnumber','expirydate','cvv'];
}
