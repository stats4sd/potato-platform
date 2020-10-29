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
        Schema::create('fructificacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('variety_id');
            $table->string('color_baya')->nullable();
            $table->string('forma_baya')->nullable();
            $table->string('madurez_variedad')->nullable();
            $table->string('codigo_baya')->nullable();
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
        Schema::dropIfExists('fructificacion');
    }
}
