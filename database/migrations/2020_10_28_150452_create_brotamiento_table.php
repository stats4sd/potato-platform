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
            $table->foreignId('variety_id')->constrained()->onDelete('cascade');
            $table->string('color_predominant_tuber_shoot')->nullable();
            $table->string('color_secondary_tuber_shoot')->nullable();
            $table->string('distribution_color_secodary_tuber_shoot')->nullable();
            $table->string('photo_tuber_shoot')->nullable();
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
        Schema::dropIfExists('sprouts');
    }
}
