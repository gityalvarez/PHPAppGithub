<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComerciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100)->unique();
            $table->string('direccion');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('logo');
            $table->integer('gerente_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('gerente_id')->references('id')->on('personas');
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
