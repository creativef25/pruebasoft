<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\TwUsuarios::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->email,
        'S_Nombre' => $faker->firstNameMale,
        'S_Apellidos' => $faker->lastName,
        'S_FotoPerfilUrl' => $faker->url,
        'S_Activo' => $faker->boolean,
        'password' => bcrypt('12345'),
        'verified' => $faker->sha1
    ];
});
