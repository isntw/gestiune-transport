<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Model::class, function (Faker $faker) {
    return [
        'adresa_plecare' => $faker->address,
        'adresa_destinatie' => $faker->address,
        'data_plecare' => $faker->dateTimeThisYear,
        'data_destinatie' => $faker->dateTimeThisYear,
        'firma' => $faker->company,
        'km' => $faker->numberBetween(1, 100),
        'incasare' => $faker->numberBetween(0, 1000),
    ];
});
