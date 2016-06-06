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

        factory(Menu::class)->create([
            'titulo' => 'Menu Principal',
            'slug' => 'menu-principal',
            'estrutura' => '[{"title":"Orders","customSelect":"http://example.com/page/1","id":6,"custom-select":"http://example.com/page/1","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0},"select2-scroll-position":{"x":0,"y":0},"children":[{"id":9,"title":"doMenu List Item. 1","customSelect":"3","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0},"custom-select":"3","children":[{"title":"Manage","customSelect":"select something...","id":7,"custom-select":"select something...","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}}]}]},{"title":"Settings","customSelect":"http://example.com/page/2","id":8,"custom-select":"http://example.com/page/2","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}},{"id":10,"title":"doMenu List Item. 1","customSelect":"select something...","__domenu_params":{},"custom-select":"select something..."}]',
            'ativo' => 1,
        ]);

        factory(Menu::class, 0)->create();
    }
}
