<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNaturalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naturales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula', 12)->unique();
            $table->integer('expedicion_mpio_id')->unsigned();
            $table->string('nombres', 150);
            $table->string('apellidos', 150);
            $table->enum('genero', ['M', 'F', 'LGBTI']);
            $table->string('direccion', 150);
            $table->integer('direccion_mpio_id')->unsigned();
            $table->string('email', 100);
            $table->string('celular', 20);
            $table->string('telefono', 50);
            $table->text('observaciones');
            $table->string('status', 5)->default('A');
            $table->integer('user_gen_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('expedicion_mpio_id')->references('id')->on('municipios');
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
        Schema::drop('naturales');
    }
}
