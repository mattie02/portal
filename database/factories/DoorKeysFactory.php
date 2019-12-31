<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DoorKeys;
use Faker\Generator as Faker;

$factory->define(DoorKeys::class, function (Faker $faker) {
    return [
        'key' => rand(100000000, 9999999999)
    ];
});
