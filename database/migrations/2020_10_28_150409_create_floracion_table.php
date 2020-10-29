<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floracion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('variety_id');
            $table->string('crecimiento')->nullable();
            $table->string('diseccion')->nullable();
            $table->string('foliolos')->nullable();
            $table->string('interhojuelas')->nullable();
            $table->string('interhojuelas_peciolulo')->nullable();
            $table->string('color_tallo')->nullable();
            $table->string('forma_alas_tallo')->nullable();
            $table->string('grado_floracion')->nullable();
            $table->string('forma_corola')->nullable();
            $table->string('color_flor')->nullable();
            $table->string('intensidad_predominante')->nullable();
            $table->string('color_flor_2')->nullable();
            $table->string('distribucion_secundario')->nullable();
            $table->string('pigmentacion_anteras')->nullable();
            $table->string('pigmentacion_pistilo')->nullable();
            $table->string('color_caliz')->nullable();
            $table->string('color_pedicelo')->nullable();
            $table->string('codigo_foto_1')->nullable();
            $table->string('codigo_foto_2')->nullable();
            $table->string('codigo_foto_3')->nullable();
            $table->string('codigo_flor')->nullable();
            $table->string('codigo_planta')->nullable();
            $table->string('tolerencia_rancha')->nullable();
            $table->string('tolerencia_granizada')->nullable();
            $table->string('tolerencia_helada')->nullable();
            $table->string('tolerencia_sequia')->nullable();
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
        Schema::dropIfExists('floracion');
    }
}
