<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_menus', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('menu_id')->unsigned()->nullable();
            $table->string('titulo', 120);
            $table->string('link', 120);
            $table->boolean('ativo')->default(1);
            
            $table->foreign('menu_id')->references('id')->on('menus')->on_update('cascade')->on_delete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('itens_menus');
    }
}
