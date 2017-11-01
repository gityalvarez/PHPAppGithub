<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComerciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comercios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 100)->unique();
			$table->string('direccion');
			$table->string('latitud');
			$table->string('longitud');
			$table->string('logo');
			$table->integer('user_id')->unsigned()->index('comercios_persona_id_foreign')->unique();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comercios');
	}

}
