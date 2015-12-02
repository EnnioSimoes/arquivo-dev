<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\Categoria::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'slug' => $faker->url,
        'dt_cadastro' => date('Y-m-d H:m:s'),
        'dt_alteracao' => '',
        'dt_exclusao' => '',
        'cadastro_usuario_id' => rand(0, 15),
        'alteracao_usuario_id' => null,
        'exclusao_usuario_id' => null,
    ];
});