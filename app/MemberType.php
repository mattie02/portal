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

    public function members() {
        // select * from articles where user_id =
        return $this->hasMany(Members::class);
    }
}
