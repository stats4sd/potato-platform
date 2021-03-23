<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkFarmersFarmerOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_farmers_farmer_organisations', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_id');
            $table->foreignId('farmer_organisation_id')->constrained('farmer_organisations')->onDelete('cascade');
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
        Schema::dropIfExists('_farmers_farmer_organisations');
    }
}
