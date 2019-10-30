<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Voluntarios;
use Faker\Generator as Faker;

$factory->define(Voluntarios::class, function (Faker $faker) {
    return [
        //
        'Nombre' => $faker->name,
        'Correo' => $faker->unique()->safeEmail,
        'Edad' => $faker->numberBetween(14, 50), 
        'Foto' => $faker->imageUrl($width = 640, $height = 480),
        'Celular' => $faker->phoneNumber,
        
    ];
});
