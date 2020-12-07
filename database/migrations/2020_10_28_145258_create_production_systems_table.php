<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_systems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained()->onDelete('cascade');
            $table->integer('varieties_harinosa')->nullable();
            $table->integer('varieties_amarga')->nullable();
            $table->integer('varieties_mejorada')->nullable();
            $table->json('crops')->nullable();
            $table->decimal('quantity_seed')->nullable();
            $table->string('unity_seed')->nullable();
            $table->decimal('area_sown')->nullable();
            $table->string('area_unity')->nullable();
            $table->integer('plots_sown_this_season')->nullable();
            $table->decimal('quantity_organic_fert')->nullable();
            $table->string('type_organic_fert')->nullable();
            $table->decimal('quantity_urea')->nullable();
            $table->decimal('quantity_nitrato_amonio')->nullable();
            $table->decimal('quantity_fostafo_amonico')->nullable();
            $table->decimal('quantity_cloruro_potasa')->nullable();
            $table->decimal('quantity_mix_papa')->nullable();
            $table->string('other_fert_name')->nullable();
            $table->decimal('quantity_other_fert')->nullable();
            $table->tinyInteger('labor_shortages_mix')->nullable();
            $table->tinyInteger('labor_shortages_commercial')->nullable();
            $table->tinyInteger('labor_shortages_bitter')->nullable();
            $table->tinyInteger('labor_shortage_improved')->nullable();
            $table->tinyInteger('labour_hired')->nullable();
            $table->json('activities_labour_hired')->nullable();
            $table->decimal('salaty_labour_male')->nullable();
            $table->decimal('salaty_labour_female')->nullable();
            $table->json('activities_ayni')->nullable();
            $table->json('pests')->nullable();
            $table->text('pests_control_before')->nullable();
            $table->text('pests_control_now')->nullable();
            $table->json('diseases')->nullable();
            $table->text('diseases_control_before')->nullable();
            $table->text('diseases_control_now')->nullable();
            $table->json('climatic_problems')->nullable();
            $table->text('measures_climatic_problems')->nullable();
            $table->decimal('quantity_mixed_potato_season')->nullable();
            $table->string('quantity_mixed_potato_season_unity')->nullable();
            $table->decimal('quantity_consumo')->nullable();
            $table->string('quantity_consumo_unity')->nullable();
            $table->decimal('quantity_chuno')->nullable();
            $table->string('quantity_chuno_unity')->nullable();

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
        Schema::dropIfExists('production_systems');
    }
}
