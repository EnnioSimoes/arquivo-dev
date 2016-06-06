<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	User::truncate();


        factory(User::class)->create([
            'name' => 'Admin',
            'sobrenome' => 'Administrador',
            'email' => 'admin@admin.com.br',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'ativo' => 1,
        ])->attachRole(1);
        factory(User::class)->create([
            'name' => 'Usuário Zuado',
            'sobrenome' => 'Big Ass User',
            'email' => 'user@user.com.br',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'ativo' => 1,
        ]);

        factory(User::class, 15)->create();
    }
}
