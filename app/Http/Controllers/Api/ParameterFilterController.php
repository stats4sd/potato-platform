<?php

namespace App\Http\Controllers\Api;

use App\Models\Variety;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Flowering;
use App\Models\Fructification;
use App\Models\Sprout;
use App\Models\TubersAtHarvest;
use App\Models\Variable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParameterFilterController extends Controller
{
    public function index()
    {
        $model_flowering = 'Flowering';
        $array_flowering = $this->generateArrayOptions($this->getColumnsFlowering(), $model_flowering);
        $options['Floración'] =  $array_flowering;

        $model_fructification = 'Fructification';
        $array_fructification = $this->generateArrayOptions($this->getColumnsFructification(), $model_fructification);
        $options['Fructificación'] =  $array_fructification;

        $model_tubers_at_harvest = 'TubersAtHarvest';
        $array_tubers_at_harvest = $this->generateArrayOptions($this->getColumnsTubersAtHarvest(), $model_tubers_at_harvest);
        $options['Tubérculos a la Cosecha'] =  $array_tubers_at_harvest;

        $model_sprouts = 'Sprout';
        $array_sprouts = $this->generateArrayOptions($this->getColumnsSprouts(), $model_sprouts);
        $options['Brotamiento'] =  $array_sprouts;

        return $options;
    }

    public function generateArrayOptions($columns, $model)
    {
        $data=[];
     
        $variables = Variable::with('choices')->where('model', $model)->get();

        foreach ($variables as $variable) {
            if($variable->db_varname!='campana'){
                $column_data['label']= $columns[$variable->db_varname];
                $column_data['value']= $variable->db_varname;
                $column_data['options'] = [];
                
                foreach ($variable->choices as $choice) {
                    
                    $column_data['options'][]= [
                        'text' => $choice->label_spanish,
                        'value' => $choice->id
                    ];
                    
                }
                $data[] = $column_data;
            }
        }
      
        return $data;
    }

    public static function getColumnsFlowering()
    {
        return array(
            'plant_growth'=>'Habito de crecimiento de la planta',
            'color_stem'=>'Color de tallo',
            'shape_stem_wings' => 'Forma de las alas del tallo',
            'leaf_dissection'=>'Tipo de la disección de la hoja',
            'number_lateral_leaflets'=>'Número de foliolos laterales de la hoja',
            'number_intermediate_leaflets'=>'Número de inter-hojuelas entre foliolos laterales',
            'number_leaflets_on_petioles'=>'Número de inter-hojuelas sobre peciolulos',
            'degree_flowering_plant' => 'Grado de floracion',
            'shape_corolla' => 'Forma de la corola',
            'color_predominant_flower' => 'Color predominant flower',
            'intensity_color_predominant_flower' => 'Intensidad de color predominante de la flor',
            'color_secondary_flower' => 'Color secundario de la flor',
            'distribution_color_secodary_flower' => 'Distribución del color secundario de la flor',
            'pigmentation_anthers' => 'Pigmentación de las anteras',
            'pigmentation_pistil' => 'Pigmentación en el pistilo',
            'color_chalice' => 'Color del cáliz',
            'color_pedicel' => 'Color del pedicelo',
            'level_tolerance_late_blight' => 'Nivel de tolerancia a la rancha',
            'level_tolerance_weevil' => 'Nivel de tolerancia al gorgojo de los andes',
            'level_tolerance_hailstorms' => 'Nivel de tolerancia a la granizada',
            'level_tolerance_frost' => 'Nivel de tolerancia a la helada',
            'level_tolerance_drought' => 'Nivel de tolerancia a la sequía',
            'campana' => 'Campana',
        );
    }

    public static function getColumnsFructification()
    {
        return array(
            'berries' => 'Bayas',
            'color_berries' => 'Color de las baya',
            'shape_berry' => 'Forma de la baya',
            'maturity_variety' => 'La madurez',
            'campana' => 'Campana',
        );
    }

    public static function getColumnsTubersAtHarvest()
    {
        return array(
            'color_predominant_tuber'=>'Color predominante',
            'intensity_color_predominant_tuber'=>'Intensidad del color predominante',
            'color_secondary_tuber'=>'Color secundario', 
            'distribution_color_secodary_tuber'=>'Distribución del color secundario', 
            'shape_tuber'=>'Forma general', 
            'variant_shape_tuber'=>'Variante de forma', 
            'depth_tuber_eyes'=>'Profundidad de los ojos', 
            'color_predominant_tuber_pulp'=>'Color predominante de la pulpa', 
            'color_secondary_tuber_pulp'=>'Color secundario de la pulpa', 
            'distribution_color_secodary_tuber_pulp'=>'Distribución del color secundario de la pulpa', 
            'number_tubers_plant'=>'Número de tubérculos por planta', 
            'yield_plant'=>'Rendimiento por planta en kg', 
            'level_tolerance_late_blight'=>'Nivel de tolerancia a la rancha', 
            'level_tolerance_weevil'=>'Nivel de tolerancia al gorgojo de los andes' ,
            'level_tolerance_hailstorms'=>'Nivel de tolerancia a la granizada', 
            'level_tolerance_frost'=>'Nivel de tolerancia a la helada', 
            'level_tolerance_drought'=>'Nivel de tolerancia a la sequía' ,
            'campana' => 'Campana',
        );
    }

    public static function getColumnsSprouts()
    {
        return array(
            'color_predominant_tuber_shoot' => 'Color predominante',
            'color_secondary_tuber_shoot' => 'Color secundario',
            'distribution_color_secodary_tuber_shoot' => 'Distribución del color secundario',
            'campana' => 'Campana',
        );
    }
}
