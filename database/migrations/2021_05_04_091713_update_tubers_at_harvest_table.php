<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTubersAtHarvestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tubers_at_harvest', function (Blueprint $table) {
            $table->string('number_tubers_plant')->nullable();
            $table->string('yield_plant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tubers_at_harvest', function (Blueprint $table) {
            $table->string('number_tubers_plant')->nullable();
            $table->string('yield_plant')->nullable();
        });
    }
}
