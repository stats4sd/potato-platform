<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsTypeTubersAtHarvestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tubers_at_harvest', function (Blueprint $table) {
            $table->unsignedBigInteger('color_predominant_tuber')->change();
            $table->unsignedBigInteger('intensity_color_predominant_tuber')->change();
            $table->unsignedBigInteger('color_secondary_tuber')->change();
            $table->unsignedBigInteger('distribution_color_secodary_tuber')->change();
            $table->unsignedBigInteger('shape_tuber')->change();
            $table->unsignedBigInteger('variant_shape_tuber')->change();
            $table->unsignedBigInteger('depth_tuber_eyes')->change();
            $table->unsignedBigInteger('color_predominant_tuber_pulp')->change();
            $table->unsignedBigInteger('color_secondary_tuber_pulp')->change();
            $table->unsignedBigInteger('distribution_color_secodary_tuber_pulp')->change();
            $table->integer('number_tubers_plant')->change();
            $table->decimal('yield_plant')->change();

            $table->unsignedBigInteger('level_tolerance_late_blight')->change();
            $table->unsignedBigInteger('level_tolerance_weevil')->change();
            $table->unsignedBigInteger('level_tolerance_hailstorms')->change();
            $table->unsignedBigInteger('level_tolerance_frost')->change();
            $table->unsignedBigInteger('level_tolerance_drought')->change();
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
        Schema::table('tubers_at_harvest', function (Blueprint $table) {
            $table->unsignedBigInteger('color_predominant_tuber');
            $table->unsignedBigInteger('intensity_color_predominant_tuber');
            $table->unsignedBigInteger('color_secondary_tuber');
            $table->unsignedBigInteger('distribution_color_secodary_tuber');
            $table->unsignedBigInteger('shape_tuber');
            $table->unsignedBigInteger('variant_shape_tuber');
            $table->unsignedBigInteger('depth_tuber_eyes');
            $table->unsignedBigInteger('color_predominant_tuber_pulp');
            $table->unsignedBigInteger('color_secondary_tuber_pulp');
            $table->unsignedBigInteger('distribution_color_secodary_tuber_pulp');
            $table->integer('number_tubers_plant');
            $table->decimal('yield_plant');

            $table->unsignedBigInteger('level_tolerance_late_blight');
            $table->unsignedBigInteger('level_tolerance_weevil');
            $table->unsignedBigInteger('level_tolerance_hailstorms');
            $table->unsignedBigInteger('level_tolerance_frost');
            $table->unsignedBigInteger('level_tolerance_drought');
            $table->unsignedBigInteger('campana');
        });

    }
}
