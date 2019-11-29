<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evento;
use Faker\Generator as Faker;

$factory->define(Evento::class, function (Faker $faker) {
    return [
        //
        'nombre_evento' => $faker->sentence(),
        'descripcion' => $faker->paragraph(),
    ];
});
