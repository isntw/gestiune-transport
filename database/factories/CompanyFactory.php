<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'cui' => $faker->numberBetween(100000, 9999999),
        'note' => $faker->text(100),
    ];
});
