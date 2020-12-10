<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowering', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variety_id');
            $table->string('plant_growth')->nullable();
            $table->string('leaf_dissection')->nullable();
            $table->string('number_lateral_leaflets')->nullable();
            $table->string('number_intermediate_leaflets')->nullable();
            $table->string('number_leaflets_on_petioles')->nullable();
            $table->string('color_stem')->nullable();
            $table->string('shape_stem_wings')->nullable();
            $table->string('degree_flowering_plant')->nullable();
            $table->string('shape_corolla')->nullable();
            $table->string('color_predominant_flower')->nullable();
            $table->string('intensity_color_predominant_flower')->nullable();
            $table->string('color_secondary_flower')->nullable();
            $table->string('distribution_color_secodary_flower')->nullable();
            $table->string('pigmentation_anthers')->nullable();
            $table->string('pigmentation_pistil')->nullable();
            $table->string('color_chalice')->nullable();
            $table->string('color_pedicel')->nullable();
            $table->json('photos')->nullable();
            $table->string('photo_flower')->nullable();
            $table->string('photo_plant')->nullable();
            $table->string('level_tolerance_late_blight')->nullable();
            $table->string('level_tolerance_hailstorms')->nullable();
            $table->string('level_tolerance_frost')->nullable();
            $table->string('level_tolerance_drought')->nullable();
            $table->foreignId('submission_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('flowering');
    }
}
