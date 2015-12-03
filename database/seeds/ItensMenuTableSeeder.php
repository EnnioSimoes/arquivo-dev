<?php

use Illuminate\Database\Seeder;
use App\Model\ItensMenu;

class ItensMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItensMenu::truncate();

        factory(ItensMenu::class, 15)->create();
    }
}