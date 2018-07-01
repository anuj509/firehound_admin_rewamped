<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Slider extends Model
{
	use EntrustUserTrait;
    protected $fillable = [
        'image', 'captionheader', 'caption','isActive',
    ];
}
