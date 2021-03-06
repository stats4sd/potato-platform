<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrotamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variety_id');
            $table->string('color_predominant_tuber_shoot')->nullable();
            $table->string('color_secondary_tuber_shoot')->nullable();
            $table->string('distribution_color_secodary_tuber_shoot')->nullable();
            $table->string('photo_tuber_shoot')->nullable();
            $table->string('campagna')->nullable();
            $table->unsignedBigInteger('submission_id')->nullable();
            $table->timestamps();
        });

        Schema::table('sprouts', function(Blueprint $table) {
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
        Schema::dropIfExists('sprouts');
    }
}
