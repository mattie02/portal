<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notes;
use Faker\Generator as Faker;

$factory->define(Notes::class, function (Faker $faker) {
    return [
        'member_id' => factory(\App\Members::class),
        'parent_id' => rand(1,99)
    ];
});
