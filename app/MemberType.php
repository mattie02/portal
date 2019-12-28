<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    // Protects from other feilds from over writen like ID
    protected $fillable = [
        'label',
        'description',
        'active'
    ];
}
