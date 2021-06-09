<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsTypeFrutificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fructification', function (Blueprint $table) {
            $table->unsignedBigInteger('color_berries')->change();
            $table->unsignedBigInteger('shape_berry')->change();
            $table->unsignedBigInteger('maturity_variety')->change();
            $table->unsignedBigInteger('campana')->change();
            $table->unsignedBigInteger('berries')->change();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fructification', function (Blueprint $table) {
            $table->unsignedBigInteger('color_berries');
            $table->unsignedBigInteger('shape_berry');
            $table->unsignedBigInteger('maturity_variety');
            $table->unsignedBigInteger('campana');
            $table->unsignedBigInteger('berries');
        });
    }
}
