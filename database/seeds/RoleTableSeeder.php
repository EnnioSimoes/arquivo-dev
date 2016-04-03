<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::truncate();
    	
        factory(Role::class)->create([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Para contas administradoras do sistema.'
        ]);
        
        factory(Role::class)->create([
            'name' => 'user',
            'display_name' => 'Usuário',
            'description' => 'Usuários cadastrados no sistema.'
        ]);
        
        factory(Role::class, 0)->create();
    }
}