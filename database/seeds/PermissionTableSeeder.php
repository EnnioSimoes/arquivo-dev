<?php

use Illuminate\Database\Seeder;
use App\Model\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Permission::truncate();

        factory(Permission::class)->create([
            'name' => 'view',
            'display_name' => 'Ver',
            'description' => 'Descricao'
        ]);

        factory(Permission::class)->create([
            'name' => 'create',
            'display_name' => 'Criar',
            'description' => 'Descricao'
        ]);

        factory(Permission::class)->create([
            'name' => 'list',
            'display_name' => 'Listar',
            'description' => 'Descricao'
        ]);

        factory(Permission::class)->create([
            'name' => 'edit',
            'display_name' => 'Editar',
            'description' => 'Descricao'
        ]);

        factory(Permission::class)->create([
            'name' => 'update',
            'display_name' => 'Atualizar',
            'description' => 'Descricao'
        ]);

        factory(Permission::class)->create([
            'name' => 'delete',
            'display_name' => 'Exluir',
            'description' => 'Descricao'
        ]);

        factory(Permission::class, 0)->create();
    }
}
