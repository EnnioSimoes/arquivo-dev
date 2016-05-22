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
            'name' => 'ver-usuarios',
            'display_name' => 'Ver Usuários',
            'description' => 'Permissão para visualizar usuários'
        ]);

        factory(Permission::class)->create([
            'name' => 'criar-usuarios',
            'display_name' => 'Criar Usúarios',
            'description' => 'Permissão para usuários'
        ]);

        factory(Permission::class)->create([
            'name' => 'list',
            'display_name' => 'Listar usuários',
            'description' => 'Permissão para Listar usuários'
        ]);

        factory(Permission::class)->create([
            'name' => 'editar-usuarios',
            'display_name' => 'Editar usuários',
            'description' => 'Permissão para Editar usuários'
        ]);

        factory(Permission::class)->create([
            'name' => 'atualizar-usuarios',
            'display_name' => 'Atualizar usuários',
            'description' => 'Permissão para Atualizar usuários'
        ]);

        factory(Permission::class)->create([
            'name' => 'excluir-usuarios',
            'display_name' => 'Exluir usuários',
            'description' => 'Permissão para Exluir usuários'
        ]);

        factory(Permission::class, 0)->create();
    }
}
