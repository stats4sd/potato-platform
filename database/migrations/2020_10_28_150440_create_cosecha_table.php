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
        Schema::create('cosecha', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('variety_id');
            $table->string('piel_color')->nullable();
            $table->string('piel_intensidad')->nullable();
            $table->string('piel_color_2')->nullable();
            $table->string('piel_color_2_dist')->nullable();
            $table->string('forma')->nullable();
            $table->string('forma_variante')->nullable();
            $table->string('forma_ojos')->nullable();
            $table->string('pulpa_color')->nullable();
            $table->string('pulpa_color_2')->nullable();
            $table->string('pulpa_color_2_dist')->nullable();
            $table->string('tolerencia_rancha')->nullable();
            $table->string('tolerencia_gorgojo')->nullable();
            $table->string('tolerencia_granizada')->nullable();
            $table->string('tolerencia_helada')->nullable();
            $table->string('tolerencia_sequia')->nullable();
            $table->string('codigo_tuberculos')->nullable();
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
        Schema::dropIfExists('cosecha');
    }
}
