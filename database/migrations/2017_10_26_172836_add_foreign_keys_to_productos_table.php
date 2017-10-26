<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			$table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'productos_persona_id_foreign')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			$table->dropForeign('productos_categoria_id_foreign');
			$table->dropForeign('productos_persona_id_foreign');
		});
	}

}
