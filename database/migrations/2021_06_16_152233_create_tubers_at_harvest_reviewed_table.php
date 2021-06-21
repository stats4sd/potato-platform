<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTubersAtHarvestReviewedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tubers_at_harvest_reviewed', function (Blueprint $table) {
            $table->id();
            $table->string('variety_id');
            $table->unsignedBigInteger('color_predominant_tuber')->nullable();
            $table->unsignedBigInteger('intensity_color_predominant_tuber')->nullable();
            $table->unsignedBigInteger('color_secondary_tuber')->nullable();
            $table->unsignedBigInteger('distribution_color_secodary_tuber')->nullable();
            $table->unsignedBigInteger('shape_tuber')->nullable();
            $table->unsignedBigInteger('variant_shape_tuber')->nullable();
            $table->unsignedBigInteger('depth_tuber_eyes')->nullable();
            $table->unsignedBigInteger('color_predominant_tuber_pulp')->nullable();
            $table->unsignedBigInteger('color_secondary_tuber_pulp')->nullable();
            $table->unsignedBigInteger('distribution_color_secodary_tuber_pulp')->nullable();
            $table->unsignedBigInteger('level_tolerance_late_blight')->nullable();
            $table->unsignedBigInteger('level_tolerance_weevil')->nullable();
            $table->unsignedBigInteger('level_tolerance_hailstorms')->nullable();
            $table->unsignedBigInteger('level_tolerance_frost')->nullable();
            $table->unsignedBigInteger('level_tolerance_drought')->nullable();
            $table->unsignedBigInteger('photo_tuber')->nullable();
            $table->integer('number_tubers_plant')->nullable();
            $table->decimal('yield_plant')->nullable();
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
        Schema::dropIfExists('tubers_at_harvest_reviewed');
    }
}
