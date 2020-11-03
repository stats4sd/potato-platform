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
        Schema::create('brotamiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('variety_id');
            $table->string('brote_color')->nullable();
            $table->string('brote_color_2')->nullable();
            $table->string('brote_color_2_dist')->nullable();
            $table->string('codigo_brote')->nullable();
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
        Schema::dropIfExists('brotamiento');
    }
}
