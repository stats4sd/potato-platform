<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variables', function (Blueprint $table) {
            $table->id();
            $table->string('data_map_id');
            $table->string('xlsform_varname')->comment('name of variable in XLSform');
            $table->string('db_varname')->comment('name of field in database');
            $table->boolean('in_db')->comment('Does the variables exist in the database?');
            $table->string('type')->comment('variable type');
            $table->string('model')->comment('The Laravel model to use');
            $table->boolean('json')->comment('Is the variable stored as json in the database?');
            $table->string('linked_other')->comment('the variable name that contains the "other" answer');
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
        Schema::dropIfExists('variables');
    }
}
