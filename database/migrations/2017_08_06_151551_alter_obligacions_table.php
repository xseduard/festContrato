<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterObligacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obligaciones', function (Blueprint $table) {
            $table->integer('progress')->unsigned();
            $table->integer('contrato_id')->unsigned();
            $table->foreign('contrato_id')->references('id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obligaciones', function (Blueprint $table) {
            $table->dropForeign('obligaciones_contrato_id_foreign');
            $table->dropColumn('contrato_id');
        });
    }
}
