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
        //Flowering
        $columns_flowering = array(
            'Plant growth'=>'plant_growth', 'Leaf dissection'=>'leaf_dissection', 
            'Number lateral leaflets'=>'number_lateral_leaflets', 
            'Number intermediate leaflets'=>'number_intermediate_leaflets', 
            'Number leaflets on petioles'=>'number_leaflets_on_petioles',
            'Color stem'=>'color_stem',
            'Shape stem wings' => 'shape_stem_wings',
            'Degree flowering plant' => 'degree_flowering_plant',
            'Shape corolla' => 'shape_corolla',
            'Color predominant flower' => 'color_predominant_flower',
            'Intensity color predominant flower' => 'intensity_color_predominant_flower',
            'Color secondary flower' => 'color_secondary_flower',
            'Distribution color secodary flower' => 'distribution_color_secodary_flower',
            'Pigmentation anthers' => 'pigmentation_anthers',
            'Pigmentation pistil' => 'pigmentation_pistil',
            'Color chalice' => 'color_chalice',
            'Color pedicel' => 'color_pedicel',
            'Level tolerance late blight' => 'level_tolerance_late_blight',
            'Level tolerance hailstorms' => 'level_tolerance_hailstorms',
            'Level tolerance frost' => 'level_tolerance_frost',
            'Level tolerance drought' => 'level_tolerance_drought'
        );

        //Fructification
        $columns_fructification= array(
            'Color berries' => 'color_berries',
            'Shape berry' => 'shape_berry',
            'Maturity variety' => 'maturity_variety'
        );

        //TubersAtHarvest
        $columns_tubers_at_harvest= array(
            'Color predominant tuber' => 'color_predominant_tuber',
            'Intensity color predominant tuber' => 'intensity_color_predominant_tuber',
            'Color secondary tuber' => 'color_secondary_tuber',
            'Distribution color secodary tuber' => 'distribution_color_secodary_tuber',
            'Shape tuber' => 'shape_tuber',
            'Variant shape tuber' => 'variant_shape_tuber',
            'Depth tuber eyes' => 'depth_tuber_eyes',
            'Color predominant tuber pulp' => 'color_predominant_tuber_pulp',
            'Color secondary tuber pulp' => 'color_secondary_tuber_pulp',
            'Distribution color secodary tuber pulp' => 'distribution_color_secodary_tuber_pulp',
            'Level tolerance late blight' => 'level_tolerance_late_blight',
            'Level tolerance weevil' => 'level_tolerance_weevil',
            'Level tolerance hailstorms' => 'level_tolerance_hailstorms',
            'Level tolerance frost' => 'level_tolerance_frost',
            'Level tolerance drought' => 'level_tolerance_drought'
        );
        //Sprouts
        $columns_sprouts= array(
            'Color predominant tuber shoot' => 'color_predominant_tuber_shoot',
            'Color secondary tuber shoot' => 'color_secondary_tuber_shoot',
            'Distribution color secodary tuber shoot' => 'distribution_color_secodary_tuber_shoot',
        );
        
        $model_flowering = 'App\\Models\\Flowering';
        $array_flowering = $this->generateArrayOptions($columns_flowering, $model_flowering);

        $model_fructification = 'App\\Models\\Fructification';
        $array_fructification = $this->generateArrayOptions($columns_fructification, $model_fructification);

        $model_tubers_at_harvest = 'App\\Models\\TubersAtHarvest'; 
        $array_tubers_at_harvest = $this->generateArrayOptions($columns_tubers_at_harvest, $model_tubers_at_harvest);

        $model_sprouts = 'App\\Models\\Sprout';
        $array_sprouts = $this->generateArrayOptions($columns_sprouts, $model_sprouts);

        return array_merge($array_flowering, $array_fructification, $array_tubers_at_harvest, $array_sprouts);
        
    }

    public function generateArrayOptions(Array $columns, $model)
    {
        $data=[];
        foreach ($columns as $key_column => $column) {
            $flowering =  $model::all()->pluck($column)->unique();
            $column_data['label']= $key_column;
            $column_data['value']= $column;
            $column_data['options'] = $flowering;
        
            foreach ($column_data['options'] as $key => $value) {
                $choice = Choice::find($value);
                if($choice){
                    $column_data['options'][$key]= $choice->label_spanish;
                } else {
                    $column_data['options'][$key]= $value;
                }
            }
            $data[] = $column_data;
        }

        return $data;
    }
}
