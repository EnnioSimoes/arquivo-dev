<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('titulo', 60);
            $table->string('link', 120);
            $table->string('imagem', 50);
            $table->text('descricao', 160);
            $table->string('autor', 50);
            $table->integer('gostei');
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->dateTime('dt_cadastro');
            $table->dateTime('dt_alteracao');
            $table->dateTime('dt_exclusao');
            $table->integer('cadastro_usuario_id')->unsigned()->nullable();
            $table->integer('alteracao_usuario_id')->unsigned()->nullable();
            $table->integer('exclusao_usuario_id')->unsigned()->nullable();
            $table->boolean('ativo');
            
            $table->foreign('categoria_id')->references('id')->on('categorias')->on_update('cascade')->on_delete('cascade'); //tabela categoria
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
        Schema::drop('posts');
    }
}
