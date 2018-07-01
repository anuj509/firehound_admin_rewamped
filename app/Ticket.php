<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable=['refnumber','title','status','description','type','assigned_to','created_by','usertype'];
}
