<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticuloPedidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('articulo_pedido', function(Blueprint $table)
		{
			$table->foreign('articulo_id')->references('id')->on('articulos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('articulo_pedido', function(Blueprint $table)
		{
			$table->dropForeign('articulo_pedido_articulo_id_foreign');
			$table->dropForeign('articulo_pedido_pedido_id_foreign');
		});
	}

}
