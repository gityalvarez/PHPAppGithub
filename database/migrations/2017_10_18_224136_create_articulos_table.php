<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticulosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stock');
            $table->decimal('precio');
            $table->integer('producto_id')->unsigned();
            $table->integer('comercio_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('comercio_id')->references('id')->on('comercios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articulos');
    }
}
