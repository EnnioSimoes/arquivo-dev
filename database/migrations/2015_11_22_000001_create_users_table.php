<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('sobrenome');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('grupo_id')->unsigned()->nullable();
			$table->rememberToken();
			$table->timestamps();
			$table->boolean('ativo')->default(1);

			$table->foreign('grupo_id')->references('id')->on('grupos')->on_update('cascade')->on_delete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}
}
