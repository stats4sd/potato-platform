<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->foreignId('community_id')->constrained()->onDelete('cascade');
            $table->string('farmhouse')->nullable();
            $table->decimal('latitude', 9,6);
            $table->decimal('longitude', 9,6);
            $table->decimal('altitude', 9,6);
            $table->string('name')->nullable();
            $table->string('DNI')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('education')->nullable();
            $table->tinyInteger('read_write')->nullable();
            $table->string('languages')->nullable();
            $table->string('language_prefered')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('whatsapp')->nullable();
            $table->string('phone_other')->nullable();
            $table->year('aguapan_year')->nullable();
            $table->json('economic_activity')->nullable();
            $table->string('main_activity')->nullable();
            $table->string('partner_name')->nullable();
            $table->integer('partner_birth')->nullable();
            $table->string('partner_education')->nullable();
            $table->integer('children_school_age')->nullable();
            $table->string('agricultural_focus')->nullable();
            $table->string('activity_agriculture')->nullable();
            $table->string('activity_livestock')->nullable();
            $table->string('production_destination')->nullable();
            $table->integer('number_hh')->nullable();
            $table->string('material')->nullable();
            $table->tinyInteger('energy')->nullable();
            $table->tinyInteger('water')->nullable();
            $table->tinyInteger('drainage')->nullable();
            $table->tinyInteger('phone_signal')->nullable();
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
        Schema::dropIfExists('farmers');
    }
}
