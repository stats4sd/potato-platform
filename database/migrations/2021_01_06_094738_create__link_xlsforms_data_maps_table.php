<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkXlsformsDataMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_link_xlsforms_data_maps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('xlsform_id')->constrained('xlsforms')->onDelete('cascade');
            $table->string('data_map_id');
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
        Schema::dropIfExists('_link_xlsforms_data_maps');
    }
}
