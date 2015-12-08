<?php

use Illuminate\Database\Seeder;
use App\Model\Grupo;

class GrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::truncate();
    	
        factory(Grupo::class, 5)->create();
    }
}
