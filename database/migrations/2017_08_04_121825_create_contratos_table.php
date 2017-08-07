<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 50);
            $table->integer('contratable_id')->unsigned();
            $table->string('contratable_type');
            $table->text('objeto');
            $table->integer('faccion_id')->unsigned();
            $table->integer('supervisor_aux_id')->unsigned();
            $table->date('fecha_expedicion');
            $table->date('fecha_vigencia_inicio');
            $table->date('fecha_vigencia_final');
            $table->decimal('valor_contrato', 19, 2);
            $table->string('compromiso_presupuestal', 100);
            $table->date('compromiso_presupuestal_fecha');
            $table->string('tipo', 150);
            $table->integer('rubro_id')->unsigned();
            $table->text('observaciones');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('faccion_id')->references('id')->on('faccions');
            $table->foreign('rubro_id')->references('id')->on('rubros');
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
        Schema::drop('contratos');
    }
}
