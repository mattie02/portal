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

    public function members() {
        return $this->belongsToMany(Members::class);
    }
}
