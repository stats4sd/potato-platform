<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\ParameterFilterController;
use App\Models\Choice;
use Illuminate\Database\Seeder;
use Mockery\Generator\Parameter;

class ChoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Flowering
        $columns_flowering = ParameterFilterController::getColumnsFlowering();
        $columns_fructification = ParameterFilterController::getColumnsFructification();
        $columns_tubers_at_harvest = ParameterFilterController::getColumnsTubersAtHarvest();
        $columns_sprouts = ParameterFilterController::getColumnsSprouts();

        $columnsets = [
            $columns_flowering,
            $columns_fructification,
            $columns_tubers_at_harvest,
            $columns_sprouts,
        ];

        foreach ($columnsets as $columns) {
            foreach ($columns as $label => $value) {
                Choice::factory([
                    'list_name' => $value,
                ])->count(10)->create();
            }
        }
    }
}
