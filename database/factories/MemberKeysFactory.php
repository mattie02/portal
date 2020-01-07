<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MemberKeys;
use Faker\Generator as Faker;

$factory->define(MemberKeys::class, function (Faker $faker) {
    return [
        'member_id' => factory(\App\Members::class),
        'key_id'    => factory(\App\DoorKeys::class)
    ];
});
