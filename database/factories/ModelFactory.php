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


$factory->define(App\Model\Grupo::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->word   
    ];
});

$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->firstName,
        'sobrenome' => $faker->lastName,
        'email' => $faker->email,
        'senha' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'grupo_id' => rand(1, 5),
        'ativo' => rand(0, 1),        
    ];
});
        
$factory->define(App\Model\Categoria::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'slug' => $faker->slug,
        'dt_cadastro' => $faker->dateTime,
        'dt_alteracao' => '',
        'dt_exclusao' => '',
        'cadastro_usuario_id' => null,
        'alteracao_usuario_id' => null,
        'exclusao_usuario_id' => null,
    ];
});

$factory->define(App\Model\Post::class, function (Faker\Generator $faker) {
    return [       
        'titulo' => $faker->word,
        'link' => $faker->url,
        'imagem' => 'http://placehold.it/350x150',
        'descricao' => $faker->word,
        'autor' => $faker->name,
        'gostei' => rand(0, 50),
        'categoria_id' => rand(1, 15),
        'dt_cadastro' => $faker->dateTime,
        'dt_alteracao' => '',
        'dt_exclusao' => '',
        'cadastro_usuario_id' => null,
        'alteracao_usuario_id' => null,
        'exclusao_usuario_id' => null,
        'ativo' => rand(0, 1),
    ];
});

$factory->define(App\Model\Site::class, function (Faker\Generator $faker) {
    return [       
        'nome' => $faker->company,
        'link' => $faker->domainName,
        'logotipo' => 'http://placehold.it/350x150',
        'facebook' => $faker->domainName,
        'youtube' => $faker->domainName,
        'github' => $faker->domainName,
        'googleplus' => $faker->domainName,
        'twitter' => $faker->domainName,
        'dt_cadastro' => $faker->dateTime,
        'dt_alteracao' => '',
        'dt_exclusao' => '',
        'cadastro_usuario_id' => null,
        'alteracao_usuario_id' => null,
        'exclusao_usuario_id' => null,
        'ativo' => rand(0, 1),         
    ];
});

$factory->define(App\Model\Menu::class, function (Faker\Generator $faker) {
    return [       
        'titulo' => $faker->word,
        'ativo' => rand(0, 1),         
    ];
});

$factory->define(App\Model\ItensMenu::class, function (Faker\Generator $faker) {
    return [       
        'menu_id' => rand(1, 5),
        'titulo' => $faker->word,
        'link' => $faker->url,
        'ativo' => rand(0, 1),         
    ];
});

$factory->define(App\Model\Pagina::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->word,
        'slug' => $faker->slug,
        'conteudo' => $faker->text,
        'descricao' => $faker->text(120),
        'dt_cadastro' => $faker->dateTime,
        'dt_alteracao' => '',
        'dt_exclusao' => '',
        'cadastro_usuario_id' => rand(1, 5),
        'alteracao_usuario_id' => '',
        'exclusao_usuario_id' => '',
        'ativo' => rand(0, 1),
    ];
});