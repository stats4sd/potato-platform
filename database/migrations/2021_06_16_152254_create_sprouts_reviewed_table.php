<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSproutsReviewedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprouts_reviewed', function (Blueprint $table) {
            $table->id();
            $table->string('variety_id');
            $table->unsignedBigInteger('color_predominant_tuber_shoot')->nullable();
            $table->unsignedBigInteger('color_secondary_tuber_shoot')->nullable();
            $table->unsignedBigInteger('distribution_color_secodary_tuber_shoot')->nullable();
            $table->unsignedBigInteger('photo_tuber_shoot')->nullable();
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
        Schema::dropIfExists('sprouts_reviewed');
    }
}
