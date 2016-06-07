<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('imagem', 120);
            $table->text('descricao', 160);
            $table->string('autor', 50);
            $table->integer('gostei');
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->integer('site_id')->unsigned()->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at');
            $table->integer('cadastro_usuario_id')->unsigned()->nullable();
            $table->integer('alteracao_usuario_id')->unsigned()->nullable();
            $table->integer('exclusao_usuario_id')->unsigned()->nullable();
            $table->boolean('ativo')->default(1);

            $table->foreign('categoria_id')->references('id')->on('categorias')->on_update('cascade')->on_delete('cascade'); //tabela categoria
            $table->foreign('site_id')->references('id')->on('sites')->on_update('cascade')->on_delete('cascade'); //tabela sites
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
