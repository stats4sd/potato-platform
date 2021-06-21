<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloweringsReviewedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowerings_reviewed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variety_id');
            $table->unsignedBigInteger('plant_growth')->nullable();
            $table->unsignedBigInteger('leaf_dissection')->nullable();
            $table->unsignedBigInteger('number_lateral_leaflets')->nullable();
            $table->unsignedBigInteger('number_intermediate_leaflets')->nullable();
            $table->unsignedBigInteger('number_leaflets_on_petioles')->nullable();
            $table->unsignedBigInteger('color_stem')->nullable();
            $table->unsignedBigInteger('shape_stem_wings')->nullable();
            $table->unsignedBigInteger('degree_flowering_plant')->nullable();
            $table->unsignedBigInteger('shape_corolla')->nullable();
            $table->unsignedBigInteger('color_predominant_flower')->nullable();
            $table->unsignedBigInteger('intensity_color_predominant_flower')->nullable();
            $table->unsignedBigInteger('color_secondary_flower')->nullable();
            $table->unsignedBigInteger('distribution_color_secodary_flower')->nullable();
            $table->unsignedBigInteger('pigmentation_anthers')->nullable();
            $table->unsignedBigInteger('pigmentation_pistil')->nullable();
            $table->unsignedBigInteger('color_chalice')->nullable();
            $table->unsignedBigInteger('color_pedicel')->nullable();
            $table->unsignedBigInteger('photo_leaf')->nullable();
            $table->unsignedBigInteger('photo_flower')->nullable();
            $table->unsignedBigInteger('photo_plant')->nullable();
            $table->unsignedBigInteger('level_tolerance_late_blight')->nullable();
            $table->unsignedBigInteger('level_tolerance_hailstorms')->nullable();
            $table->unsignedBigInteger('level_tolerance_frost')->nullable();
            $table->unsignedBigInteger('level_tolerance_drought')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flowerings_reviewed');
    }
}
