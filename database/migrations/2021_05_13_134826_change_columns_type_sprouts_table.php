<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsTypeSproutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sprouts', function (Blueprint $table) {
            $table->unsignedBigInteger('color_predominant_tuber_shoot')->change();
            $table->unsignedBigInteger('color_secondary_tuber_shoot')->change();
            $table->unsignedBigInteger('distribution_color_secodary_tuber_shoot')->change();
            $table->unsignedBigInteger('campana')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sprouts', function (Blueprint $table) {
            $table->unsignedBigInteger('color_predominant_tuber_shoot');
            $table->unsignedBigInteger('color_secondary_tuber_shoot');
            $table->unsignedBigInteger('distribution_color_secodary_tuber_shoot');
            $table->unsignedBigInteger('campana');
        });
    }
}
