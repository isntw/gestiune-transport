<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Cost::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 6),
        'pay_date' => $faker->dateTimeThisYear,
        'suma' => $faker->numberBetween(0, 1000),
        'detalii' => $faker->text(50),
    ];
});
