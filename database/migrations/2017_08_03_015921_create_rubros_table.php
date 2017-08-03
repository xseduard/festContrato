<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRubrosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('codigo', 30);
            $table->decimal('valor', 19, 2);
            $table->date('fecha_vigencia_inicio');
            $table->date('fecha_vigencia_final');
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
        Schema::drop('rubros');
    }
}
