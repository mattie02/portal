<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Members;
use Faker\Generator as Faker;

$factory->define(Members::class, function (Faker $faker) {
    return [
        'lname'                => $faker->firstNameFemale,
        'fname'                => $faker->lastName,
        'dob'                  => $faker->date(),
        'email'                => $faker->email,
        'email_private'        => rand(0,1),
        'phone_mobile'         => $faker->phoneNumber,
        'phone_mobile_private' => rand(0,1),
        'phone_alt'            => $faker->phoneNumber,
        'phone_alt_private'    => rand(0,1),
        'application_date'     => $faker->date(),
        'approval_date'        => $faker->date(),
        'street_address'       => $faker->streetAddress,
        'city'                 => $faker->city,
        'state'                => $faker->state,
        'zip'                  => $faker->numberBetween(10000,99999),
        'mem_type_id'          => $faker->numberBetween(1,10),
        'mem_sponser_id'       => $faker->numberBetween(1,99),
        'user_id'              => $faker->numberBetween(1,99),
    ];
});
