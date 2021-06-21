<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFructificationsReviewedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fructifications_reviewed', function (Blueprint $table) {
            $table->id();
            $table->string('variety_id');
            $table->unsignedBigInteger('color_berries')->nullable();
            $table->unsignedBigInteger('shape_berry')->nullable();
            $table->unsignedBigInteger('maturity_variety')->nullable();
            $table->unsignedBigInteger('photo_berry')->nullable();
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
        Schema::dropIfExists('fructifications_reviewed');
    }
}
