<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJuridicosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juridicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit', 15);
            $table->string('nombre');
            $table->string('razon_social');
            $table->integer('natural_id')->unsigned();
            $table->string('actividad');
            $table->string('direccion', 150);
            $table->integer('municipio_id')->unsigned();
            $table->string('email', 100);
            $table->string('celular', 20);
            $table->string('telefono', 100);
            $table->text('observaciones');
            $table->string('status', 5)->default('A');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('juridicos');
    }
}
