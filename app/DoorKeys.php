<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoorKeys extends Model
{
    protected $fillable = [
        'label',
        'key',
        'active' 
    ];
}
