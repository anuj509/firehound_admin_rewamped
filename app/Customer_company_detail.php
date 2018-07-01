<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_company_detail extends Model
{
    protected $fillable = ['customer_id','companyname','contact','address','state','pincode','marketplace','marketplacename','sales','fulfillment','categories_deals'];
}
