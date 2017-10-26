<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articulos', function(Blueprint $table)
		{
			$table->foreign('comercio_id')->references('id')->on('comercios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('producto_id')->references('id')->on('productos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('articulos', function(Blueprint $table)
		{
			$table->dropForeign('articulos_comercio_id_foreign');
			$table->dropForeign('articulos_producto_id_foreign');
		});
	}

}
