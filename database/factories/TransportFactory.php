<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Transport::class, function (Faker $faker) {

    return [
        'firma' => $faker->company,
        'adresa_plecare' => $faker->streetAddress,
        'adresa_destinatie' => $faker->streetAddress,
        'km' => $faker->numberBetween(10, 100),
        'dislocare_km' => $faker->numberBetween(2, 20),
        'data_plecare' => $faker->dateTimeThisYear,
        'timp' => $faker->numberBetween(2, 24),
        'kg' => $faker->numberBetween(10, 100),
        'suma' => $faker->numberBetween(100, 1000),
    ];
});
