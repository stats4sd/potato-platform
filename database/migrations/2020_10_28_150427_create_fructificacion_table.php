<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFructificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fructification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variety_id');
            $table->string('color_berries')->nullable();
            $table->string('shape_berry')->nullable();
            $table->string('maturity_variety')->nullable();
            $table->string('photo_berry')->nullable();
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
        Schema::dropIfExists('fructification');
    }
}
