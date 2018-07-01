<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeGuide extends Model
{
    protected $table='type_guide';
    protected $fillable=['type_id','guide_id'];
    public $timestamps = false;
}
