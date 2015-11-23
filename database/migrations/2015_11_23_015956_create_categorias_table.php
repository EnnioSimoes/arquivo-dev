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
            $table->increments('id');
            $table->string('nome');
            $table->string('slug');
            $table->dateTime('dt_cadastro');
            $table->dateTime('dt_alteracao');
            $table->dateTime('dt_exclusao');
            $table->integer('cadastro_usuario_id');
            $table->foreign('cadastro_usuario_id')->references('id')->on('users');
            $table->integer('alteracao_usuario_id');
            $table->foreign('alteracao_usuario_id')->references('id')->on('users');
            $table->integer('exclusao_usuario_id');
            $table->foreign('exclusao_usuario_id')->references('id')->on('users');
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
