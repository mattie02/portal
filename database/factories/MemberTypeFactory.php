<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MemberType;
use Faker\Generator as Faker;

$factory->define(MemberType::class, function (Faker $faker) {
    return [
        'label'       => $faker->sentence,
        'description' => $faker->sentence,
        'active'      => rand(0,1)
    ];
});
