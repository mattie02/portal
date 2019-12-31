<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MemberKeys;
use Faker\Generator as Faker;

$factory->define(MemberKeys::class, function (Faker $faker) {
    return [
        'member_id' => rand(1,99),
        'key_id'    => rand(1,99)
    ];
});
