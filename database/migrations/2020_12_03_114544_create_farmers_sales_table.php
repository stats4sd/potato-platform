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
            $table->string('farmer_id');
            $table->decimal('consumption_quantity')->nullable();
            $table->string('consumption_quantity_unit')->nullable();
            $table->decimal('community_price_consumption_soles/kg')->nullable();
            $table->decimal('consumption_price_out_sole/kg')->nullable();
            $table->json('consumption_sold')->nullable();
            $table->string('commercial_varieties_consumption')->nullable();
            $table->string('rare_varieties_consumption')->nullable();
            $table->json('consumption_who')->nullable();
            $table->json('consumption_where')->nullable();
            $table->decimal('seed_quantity')->nullable();
            $table->string('seed_quantity_unit')->nullable();
            $table->decimal('community_price_seed_sole/kg')->nullable();
            $table->decimal('price_seed_out_sole/kg')->nullable();
            $table->json('seed_sold')->nullable();
            $table->string('commercial_varieties_seed')->nullable();
            $table->string('rare_varieties_seed')->nullable();
            $table->json('seed_who')->nullable();
            $table->json('seed_where')->nullable();
            $table->tinyInteger('native_potato_think_sell')->nullable();
            $table->decimal('quantity_think_sell')->nullable();
            $table->string('quantity_think_sell_unity')->nullable();
            $table->json('how_think_sell')->nullable();
            $table->string('commercial_varieties_think_sell')->nullable();
            $table->string('rare_varieties_think_sell')->nullable();
            $table->tinyInteger('sell_with_misky')->nullable();
            $table->tinyInteger('collective_branding_conditions')->nullable();
            $table->tinyInteger('know_mark')->nullable();
            $table->tinyInteger('sold_with_miski')->nullable();
            $table->string('coordination')->nullable();
            $table->string('amount')->nullable();
            $table->string('price')->nullable();
            $table->string('payment_form')->nullable();
            $table->string('selection_classification')->nullable();
            $table->json('difficulties')->nullable();
            $table->string('payment_transport')->nullable();
            $table->decimal('amount_mix')->nullable();
            $table->string('mix_units')->nullable();
            $table->string('comparison_quantity')->nullable();
            $table->tinyInteger('sell_miski_next_harvest')->nullable();
            $table->tinyInteger('quality control')->nullable();
            $table->tinyInteger('complete_control_quality')->nullable();
            $table->string('month')->nullable();
            $table->string('send_ potatoes')->nullable();
            $table->tinyInteger('send_pictures')->nullable();
            $table->tinyInteger('requires_training')->nullable();
            $table->json('phone_training')->nullable();
            $table->string('campana')->nullable();
            $table->unsignedBigInteger('submission_id')->nullable();
            $table->timestamps();
        });

        Schema::table('farmers_sales', function(Blueprint $table) {
            $table->foreign('submission_id')->references('id')->on('submissions')->onDelete('restrict');
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
