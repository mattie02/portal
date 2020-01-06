<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable = [
        'member_id',
        'parent_id',
        'body',
        'user_id'
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
}