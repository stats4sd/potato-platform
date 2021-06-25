<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsTypeFloweringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flowering', function (Blueprint $table) {
            $table->unsignedBigInteger('plant_growth')->change();
            $table->unsignedBigInteger('leaf_dissection')->change();
            $table->unsignedBigInteger('number_lateral_leaflets')->change();
            $table->unsignedBigInteger('number_intermediate_leaflets')->change();
            $table->unsignedBigInteger('number_leaflets_on_petioles')->change();
            $table->unsignedBigInteger('color_stem')->change();
            $table->unsignedBigInteger('shape_stem_wings')->change();
            $table->unsignedBigInteger('degree_flowering_plant')->change();
            $table->unsignedBigInteger('shape_corolla')->change();
            $table->unsignedBigInteger('color_predominant_flower')->change();
            $table->unsignedBigInteger('intensity_color_predominant_flower')->change();
            $table->unsignedBigInteger('color_secondary_flower')->change();
            $table->unsignedBigInteger('distribution_color_secodary_flower')->change();
            $table->unsignedBigInteger('pigmentation_anthers')->change();
            $table->unsignedBigInteger('pigmentation_pistil')->change();
            $table->unsignedBigInteger('color_chalice')->change();
            $table->unsignedBigInteger('color_pedicel')->change();
            $table->unsignedBigInteger('level_tolerance_late_blight')->change();
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
        Schema::table('flowering', function (Blueprint $table) {
            $table->unsignedBigInteger('plant_growth');
            $table->unsignedBigInteger('leaf_dissection');
            $table->unsignedBigInteger('number_lateral_leaflets');
            $table->unsignedBigInteger('number_intermediate_leaflets');
            $table->unsignedBigInteger('number_leaflets_on_petioles');
            $table->unsignedBigInteger('color_stem');
            $table->unsignedBigInteger('shape_stem_wings');
            $table->unsignedBigInteger('degree_flowering_plant');
            $table->unsignedBigInteger('shape_corolla');
            $table->unsignedBigInteger('color_predominant_flower');
            $table->unsignedBigInteger('intensity_color_predominant_flower');
            $table->unsignedBigInteger('color_secondary_flower');
            $table->unsignedBigInteger('distribution_color_secodary_flower');
            $table->unsignedBigInteger('pigmentation_anthers');
            $table->unsignedBigInteger('pigmentation_pistil');
            $table->unsignedBigInteger('color_chalice');
            $table->unsignedBigInteger('color_pedicel');
            $table->unsignedBigInteger('level_tolerance_late_blight');
            $table->unsignedBigInteger('level_tolerance_hailstorms');
            $table->unsignedBigInteger('level_tolerance_frost');
            $table->unsignedBigInteger('level_tolerance_drought');
            $table->unsignedBigInteger('campana');
        });

    }
}
