<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosechaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tubers_at_harvest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variety_id');
            $table->string('color_predominant_tuber')->nullable();
            $table->string('intensity_color_predominant_tuber')->nullable();
            $table->string('color_secondary_tuber')->nullable();
            $table->string('distribution_color_secodary_tuber')->nullable();
            $table->string('shape_tuber')->nullable();
            $table->string('variant_shape_tuber')->nullable();
            $table->string('depth_tuber_eyes')->nullable();
            $table->string('color_predominant_tuber_pulp')->nullable();
            $table->string('color_secondary_tuber_pulp')->nullable();
            $table->string('distribution_color_secodary_tuber_pulp')->nullable();
            $table->string('level_tolerance_late_blight')->nullable();
            $table->string('level_tolerance_weevil')->nullable();
            $table->string('level_tolerance_hailstorms')->nullable();
            $table->string('level_tolerance_frost')->nullable();
            $table->string('level_tolerance_drought')->nullable();
            $table->string('photo_tuber')->nullable();
            $table->string('campana')->nullable();
            $table->unsignedBigInteger('submission_id')->nullable();
            $table->timestamps();
        });

        Schema::table('tubers_at_harvest', function(Blueprint $table) {
            $table->foreign('submission_id')->references('id')->on('submissions')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tubers_at_harvest');
    }
}
