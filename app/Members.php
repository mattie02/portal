<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    // What data can be inputed 
    protected $fillable = [
        'lname',
        'fname',
        'dob',
        'email',
        'email_private',
        'phone_mobile',
        'phone_mobile_private',
        'phone_alt',
        'phone_alt_private',
        'application_date',
        'approval_date',
        'street_address',
        'city',
        'state',
        'zip',
        'mem_type_id',
        'mem_sponser_id'
    ];

    public function memtype() {
        return $this->belongsTo(MemberType::class, 'mem_type_id');
    }

    public function keys() {
        return $this->belongsToMany(DoorKeys::class, 'member_keys', 'member_id', 'key_id');
    }
}
