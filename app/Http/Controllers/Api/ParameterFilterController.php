<?php

namespace App\Http\Controllers\Api;

use App\Models\Variety;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Flowering;
use App\Models\TubersAtHarvest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParameterFilterController extends Controller
{
    public function index()
    {
        $model_flowering = 'App\\Models\\Flowering';
        $array_flowering = $this->generateArrayOptions($this->getColumnsFlowering(), $model_flowering);
        $options['Floración'] =  $array_flowering;

        $model_fructification = 'App\\Models\\Fructification';
        $array_fructification = $this->generateArrayOptions($this->getColumnsFructification(), $model_fructification);
        $options['Fructificación'] =  $array_fructification;

        $model_tubers_at_harvest = 'App\\Models\\TubersAtHarvest';
        $array_tubers_at_harvest = $this->generateArrayOptions($this->getColumnsTubersAtHarvest(), $model_tubers_at_harvest);
        $options['Tubérculos a la Cosecha'] =  $array_tubers_at_harvest;

        $model_sprouts = 'App\\Models\\Sprout';
        $array_sprouts = $this->generateArrayOptions($this->getColumnsSprouts(), $model_sprouts);
        $options['Brotamiento'] =  $array_sprouts;

        return $options;
    }

    public function generateArrayOptions(array $columns, $model)
    {
        $data=[];
        $choices_all = Choice::all();
        $model_all = $model::all();

        foreach ($columns as $key_column => $column) {
            $flowering =   $model_all->pluck($column)->unique();
            $column_data['label']= $key_column;
            $column_data['value']= $column;
            $column_data['options'] = $flowering;

            foreach ($column_data['options'] as $key => $value) {
                $choice =  $choices_all->where('id', $value)->first();
                if ($choice) {
                    $column_data['options'][$key]= $choice->label_spanish;
                } else {
                    $column_data['options'][$key]= $value;
                }
            }
            $data[] = $column_data;
        }

        return $data;
    }

    public static function getColumnsFlowering()
    {
        return array(
            'Habito de crecimiento de la planta'=>'plant_growth', 'Tipo de la disección de la hoja'=>'leaf_dissection',
            'Número de foliolos laterales de la hoja'=>'number_lateral_leaflets',
            'Número de inter-hojuelas entre foliolos laterales'=>'number_intermediate_leaflets',
            'Número de inter-hojuelas sobre peciolulos'=>'number_leaflets_on_petioles',
            'Color de tallo de esta planta'=>'color_stem',
            'Forma de las alas del tallo' => 'shape_stem_wings',
            'Degree flowering plant' => 'degree_flowering_plant',
            'Shape corolla' => 'shape_corolla',
            'Color predominant flower' => 'color_predominant_flower',
            'Grado de floracion de esta planta' => 'intensity_color_predominant_flower',
            'Color secundario de la flor' => 'color_secondary_flower',
            'Distribución del color secundario de la flor' => 'distribution_color_secodary_flower',
            'Pigmentación de las anteras' => 'pigmentation_anthers',
            'Pigmentación en el pistilo' => 'pigmentation_pistil',
            'Color del cáliz' => 'color_chalice',
            'Color del pedicelo' => 'color_pedicel',
            'Nivel de tolerancia a la rancha' => 'level_tolerance_late_blight',
            'Nivel de tolerancia a la granizada' => 'level_tolerance_hailstorms',
            'Nivel de tolerancia a la helada' => 'level_tolerance_frost',
            'Nivel de tolerancia a la sequía' => 'level_tolerance_drought'
        );
    }

    public static function getColumnsFructification()
    {
        return array(
            'Color de las baya' => 'color_berries',
            'Forma de la baya' => 'shape_berry',
            'La madurez' => 'maturity_variety'
        );
    }

    public static function getColumnsTubersAtHarvest()
    {
        return array(
            'Color predominante' => 'color_predominant_tuber',
            'Intensidad del color predominante' => 'intensity_color_predominant_tuber',
            'Color secundario' => 'color_secodary_tuber',
            'Distribución del color secundario' => 'distribution_color_secodary_tuber',
            'Forma general' => 'shape_tuber',
            'Variante de forma' => 'variant_shape_tuber',
            'Profundidad de los ojos' => 'depth_tuber_eyes',
            'Color predominante de la pulpa' => 'color_predominant_tuber_pulp',
            'Color secundario de la pulpa' => 'color_secondary_tuber_pulp',
            'Distribución del color secundario de la pulpa' => 'distribution_color_secodary_tuber_pulp',
            'Nivel de tolerancia a la rancha' => 'level_tolerance_late_blight',
            'Nivel de tolerancia al gorgojo de los andes' => 'level_tolerance_weevil',
            'Nivel de tolerancia a la granizada' => 'level_tolerance_hailstorms',
            'Nivel de tolerancia a la helada' => 'level_tolerance_frost',
            'Nivel de tolerancia a la sequía' => 'level_tolerance_drought'
        );
    }

    public static function getColumnsSprouts()
    {
        return array(
            'Color predominante' => 'color_predominant_tuber_shoot',
            'Color secundario' => 'color_secondary_tuber_shoot',
            'Distribución del color secundario' => 'distribution_color_secodary_tuber_shoot',
        );
    }
}
