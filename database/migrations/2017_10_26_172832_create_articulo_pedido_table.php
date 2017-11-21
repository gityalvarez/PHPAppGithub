<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticuloPedidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articulo_pedido', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('cantidad')->unsigned();
			$table->integer('articulo_id')->unsigned()->index('articulo_pedido_articulo_id_foreign');
			$table->integer('pedido_id')->unsigned()->index('articulo_pedido_pedido_id_foreign');
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
		Schema::drop('articulo_pedido');
	}

}
