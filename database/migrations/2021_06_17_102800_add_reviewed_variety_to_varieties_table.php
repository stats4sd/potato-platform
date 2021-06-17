<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReviewedVarietyToVarietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('varieties', function (Blueprint $table) {
            $table->tinyInteger('reviewed')->after('additional_info');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('varieties', function (Blueprint $table) {
            $table->tinyInteger('reviewed');
        });
    }
}
