<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberKeys extends Model
{
    protected $fillable = [
        'member_id',
        'key_id'
    ];
}
