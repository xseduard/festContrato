<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNaturalsCargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('naturales', function (Blueprint $table) {
            $table->integer('cargo_id')->nullable();
            $table->integer('faccion_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('naturales', function (Blueprint $table) {
            $table->dropColumn('cargo_id');
            $table->dropColumn('faccion_id');
        });
    }
}
