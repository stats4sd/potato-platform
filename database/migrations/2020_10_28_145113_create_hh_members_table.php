<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHhMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hh_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('farmer_id');
            $table->string('name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('education')->nullable();
            $table->tinyInteger('helps_farm')->nullable();
            $table->decimal('months')->nullable();
            $table->decimal('days')->nullable();
            $table->decimal('hours')->nullable();
            $table->string('main_job')->nullable();
            $table->tinyInteger('pay')->nullable();
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
        Schema::dropIfExists('hh_members');
    }
}
