<?php

use Illuminate\Database\Seeder;
use App\Model\Pagina;

class PaginaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pagina::truncate();

        factory(Pagina::class, 5)->create();
    }
}
