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
            'name' => 'create-user',
            'display_name' => 'Criar usuários',
            'description' => ''
        ]);
        
        factory(Permission::class)->create([
            'name' => 'list-user',
            'display_name' => 'Listar usuários',
            'description' => ''
        ]);

        factory(Permission::class)->create([
            'name' => 'edit-user',
            'display_name' => 'Editar usuários',
            'description' => ''
        ]);

        factory(Permission::class)->create([
            'name' => 'update-user',
            'display_name' => 'Atualizar usuários',
            'description' => ''
        ]);

        factory(Permission::class)->create([
            'name' => 'delete-user',
            'display_name' => 'Exluir usuários',
            'description' => ''
        ]);
        
        factory(Permission::class, 0)->create();
    }
}