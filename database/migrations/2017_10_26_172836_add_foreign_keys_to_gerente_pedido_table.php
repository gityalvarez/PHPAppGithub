<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGerentePedidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gerente_pedido', function(Blueprint $table)
		{
			$table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'gerente_pedido_persona_id_foreign')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gerente_pedido', function(Blueprint $table)
		{
			$table->dropForeign('gerente_pedido_pedido_id_foreign');
			$table->dropForeign('gerente_pedido_persona_id_foreign');
		});
	}

}
