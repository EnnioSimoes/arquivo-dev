<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('nome');
            $table->string('slug');
            $table->dateTime('dt_cadastro');
            $table->dateTime('dt_alteracao');
            $table->dateTime('dt_exclusao');
            $table->integer('cadastro_usuario_id')->unsigned()->nullable();
            $table->integer('alteracao_usuario_id')->unsigned()->nullable();
            $table->integer('exclusao_usuario_id')->unsigned()->nullable();
            
            $table->foreign('cadastro_usuario_id')->references('id')->on('users')->on_update('cascade')->on_delete('cascade');
            $table->foreign('alteracao_usuario_id')->references('id')->on('users')->on_update('cascade')->on_delete('cascade');
            $table->foreign('exclusao_usuario_id')->references('id')->on('users')->on_update('cascade')->on_delete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorias');
    }
}
