<?php

use Illuminate\Database\Seeder;
use App\Model\Resource;

class ResourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resource::truncate();

        factory(Resource::class)->create([
            'name' => 'posts',
            'display_name' => 'Posts',
            'description' => 'Módulo de posts'
        ]);

        factory(Resource::class)->create([
            'name' => 'categorias',
            'display_name' => 'Categorias',
            'description' => 'Módulo de Categorias'
        ]);

        factory(Resource::class)->create([
            'name' => 'sites',
            'display_name' => 'Sites',
            'description' => 'Módulo de Sites'
        ]);

        factory(Resource::class)->create([
            'name' => 'usuarios',
            'display_name' => 'Usuários',
            'description' => 'Módulo de Usuários'
        ]);

        factory(Resource::class, 0)->create();
    }
}
