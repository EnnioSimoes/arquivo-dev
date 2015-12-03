<?php

use Illuminate\Database\Seeder;
use App\Model\Site;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::truncate();

        factory(Site::class, 15)->create();
    }
}
