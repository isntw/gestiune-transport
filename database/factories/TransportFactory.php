<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Transport::class, function (Faker $faker) {
    $start_date = $faker->dateTimeThisMonth;
    $end_date = $faker->dateTime($start_date, "+2 days");

    return [
        'adresa_plecare' => $faker->address,
        'adresa_destinatie' => $faker->address,
        'data_plecare' => $start_date,
        'data_destinatie' => $end_date,
        'firma' => $faker->company,
        'km' => $faker->numberBetween(1, 100),
        'incasare' => $faker->numberBetween(0, 1000),
    ];
});
