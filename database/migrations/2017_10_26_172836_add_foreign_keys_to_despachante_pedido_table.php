<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDespachantePedidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('despachante_pedido', function(Blueprint $table)
		{
			$table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'despachante_pedido_persona_id_foreign')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('despachante_pedido', function(Blueprint $table)
		{
			$table->dropForeign('despachante_pedido_pedido_id_foreign');
			$table->dropForeign('despachante_pedido_persona_id_foreign');
		});
	}

}
