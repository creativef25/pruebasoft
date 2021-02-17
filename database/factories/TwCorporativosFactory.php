<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\TwCorporativos::class, function (Faker $faker) {
    return [
        'S_NombreCorto' => $faker->companySuffix,
        'S_NombreCompleto' => $faker->company,
        'S_LogoUrl' => $faker->imageUrl($width = 640, $height = 480),
        'S_DBName' => $faker->word,
        'S_DBUsuario' => $faker->userName,
        'S_DBPassword' => $faker->password,
        'S_SystemUrl' => $faker->url,
        'S_Activo' => $faker->boolean,
        'tw_usuarios_id' => factory(App\TwUsuarios::class)
    ];
});
