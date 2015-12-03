<?php

use Illuminate\Database\Seeder;
use App\Model\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Menu::truncate();

        factory(Menu::class, 5)->create();
    }
}
