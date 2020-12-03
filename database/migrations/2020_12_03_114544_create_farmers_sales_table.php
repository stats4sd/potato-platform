<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained()->onDelete('cascade');
            $table->foreignId('farmer_id')->constrained()->onDelete('cascade');
            $table->string('quantity_sold')->nullable();
            $table->json('place_sale')->nullable();
            $table->string('location_place')->nullable();
            $table->string('form_sale')->nullable();
            $table->json('sold_to')->nullable();
            $table->string('use')->nullable();
            $table->decimal('price_consumption')->nullable();
            $table->decimal('price_seed')->nullable();
            $table->string('price_outside')->nullable();
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
        Schema::dropIfExists('farmers_sales');
    }
}
