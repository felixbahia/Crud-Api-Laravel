<?php

use App\Crud;
use Faker\Generator as Faker;

$factory->define(Crud::class, function (Faker $faker) {
    return [
        'marca' => $faker->text,
        'modelo' => $faker->text,
        'ano' => $faker->randomFloat(2),
    ];
});
