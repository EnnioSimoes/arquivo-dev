<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('nome', 60);
            $table->string('link', 120);
            $table->string('logotipo', 60);
            $table->string('facebook', 160);
            $table->string('youtube', 160);
            $table->string('github', 160);
            $table->string('googleplus', 160);
            $table->string('twitter', 160);
            $table->dateTime('dt_cadastro');
            $table->dateTime('dt_alteracao');
            $table->dateTime('dt_exclusao');
            $table->integer('cadastro_usuario_id')->unsigned()->nullable();
            $table->integer('alteracao_usuario_id')->unsigned()->nullable();
            $table->integer('exclusao_usuario_id')->unsigned()->nullable();
            $table->boolean('ativo')->default(1);
            
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
        //
    }
}
