<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Farmer;
use App\Models\Variety;
use App\Models\Flowering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
    public function index()
    {
    }

    public function getVarietyDetails(Request $request)
    {
        $variety = Variety::findOrFail($request->variety_id);
        
        // EVENTUALLY, we will have to reconcile the possibility of having multiple subtable records for a single variety. For now, just take the first entry...
        $fruits = $variety->fructifications->first();
        $flowering =  $variety->flowerings->first();
        $sprouts =  $variety->sprouts->first();
        $tubersAtHarvest =  $variety->tubersAtHarvests->first();
        $farmer = Farmer::where('id', $variety->farmer_id)->with('varieties')->withCount('varieties')->with('community.district.province.region')->first();
       
        //Could refactor this to hold variable names and labels in a database table...
        $farmerLabels = [
            'name' => "Guardián",
            'community' => "Comunidad",
            'district' => "Distrito",
            'province' => "Provincia",
            'region' => "Región",
            'aguapan_year' => "Pertenece a AGUAPAN desde",
            'varieties_count' => "Número de variedades en la base de datos"
        ];

        $floweringLabels = [
            'plant_growth' => 'Habito de crecimiento de la planta',
            'color_stem' => 'Color de tallo',
            'shape_stem_wings' => 'Forma de las alas del tallo',

            'leaf_dissection' => 'Tipo de la disección de la hoja',
            'number_lateral_leaflets' => 'Número de foliolos laterales de la hoja',
            'number_intermediate_leaflets' => 'Número de inter-hojuelas entre foliolos laterales',
            'number_leaflets_on_petioles' => 'Número de inter-hojuelas sobre peciolulos',

            'degree_flowering_plant' => 'Grado de floracion',
            'shape_corolla' => 'Forma de la corola',
            'color_predominant_flower' => 'Color predominante de la flor',
            'intensity_color_predominant_flower' => 'Intensidad de color predominante de la flor',
            'color_secondary_flower' => 'Color secundario de la flor',
            'distribution_color_secodary_flower' => 'Distribución del color secundario de la flor',
            'pigmentation_anthers' => 'Pigmentación de las anteras',
            'pigmentation_pistil' => 'Pigmentación en el pistilo',
            'color_chalice' => 'Color del cáliz',
            'color_pedicel' => 'Color del pedicelo',

            'level_tolerance_late_blight' => 'Nivel de tolerancia a la rancha',
            'level_tolerance_hailstorms' => 'Nivel de tolerancia a la granizada',
            'level_tolerance_frost' => 'Nivel de tolerancia a la helada',
            'level_tolerance_drought ' => 'Nivel de tolerancia a la sequía',
        ];

        $fruitsLabels = [
            'berries' => 'Bayas',
            'color_berries' => 'Color de la baya',
            'shape_berry' => 'Forma de la baya',
            'maturity_variety' => 'La madurez',
        ];

        $sproutsLabels = [
            'color_predominant_tuber_shoot' => 'Color predominante',
            'color_secondary_tuber_shoot' => 'Color secundario',
            'distribution_color_secodary_tuber_shoot' => 'Distribución del color secundario',
        ];

        $tubersAtHarvestLabels = [
            'color_predominant_tuber' => 'Color predominante',
            'intensity_color_predominant_tuber' => 'Intensidad del color predominante',
            'color_secondary_tuber' => 'Color secundario',
            'distribution_color_secodary_tuber' => 'Distribución del color secundario',
            'shape_tuber' => 'Forma general',
            'variant_shape_tuber' => 'Variante de forma',
            'depth_tuber_eyes' => 'Profundidad de los ojos',
            'color_predominant_tuber_pul' => 'Color predominante de la pulpa',
            'color_secondary_tuber_pulp' => 'Color secundario de la pulpa',
            'distribution_color_secodary_tuber_pulp' => 'Distribución del color secundario de la pulpa',
            "number_tubers_plant" => "Número de tubérculos por planta",
            "yield_plant" => "Rendimiento por planta en kg",

            'level_tolerance_late_blight' => 'Nivel de tolerancia a la rancha',
            'level_tolerance_weevil' => 'Nivel de tolerancia al gorgojo de los andes',
            'level_tolerance_hailstorms' => 'Nivel de tolerancia a la granizada',
            'level_tolerance_frost' => 'Nivel de tolerancia a la helada',
            'level_tolerance_drought' => 'Nivel de tolerancia a la sequía',

        ];

        if (!empty($flowering)) {

            $flowering = $this->getChoiceLabel($floweringLabels, $flowering);
        }
        if (!empty($fruits)) {

            $fruits = $this->getChoiceLabel($fruitsLabels, $fruits);
        }
        if (!empty($sprouts)) {

            $sprouts = $this->getChoiceLabel($sproutsLabels, $sprouts);
        }
        if (!empty($tubersAtHarvest)) {

            $tubersAtHarvest = $this->getChoiceLabel($tubersAtHarvestLabels, $tubersAtHarvest);
        }

        // if (!empty($farmer)) {

        //     $farmer = $this->getChoiceLabel($farmerLabels, $farmer);
        // }


        return response()->json([
            'values' => [
                'fruits'=> $fruits,
                'flowering' => $flowering,
                'sprouts' => $sprouts,
                'tubersAtHarvest' => $tubersAtHarvest,
                'farmer' => $farmer,
            ],
            'labels' => [
                'fruits' => $fruitsLabels,
                'flowering' => $floweringLabels,
                'sprouts' => $sproutsLabels,
                'tubersAtHarvest' => $tubersAtHarvestLabels,
                'farmer' => $farmerLabels,
            ],
        ]);
    }

    public function getVarietyFilter(Request $request)
    {
        $filterSet = false;
        foreach (array_merge(
            $request->selectedFiltersFlowering,
            $request->selectedFiltersFructification,
            $request->selectedFiltersTubersAtHarvest,
            $request->selectedFiltersSprout,
        
        ) as $key => $value) {
            if ($value !== []) {
                $filterSet = true;
            }
        }
        if ($filterSet) {
            $variety_flowering = $this->getVarietyWhereOptions($request->selectedFiltersFlowering, 'App\\Models\\Flowering');
            $variety_fructation = $this->getVarietyWhereOptions($request->selectedFiltersFructification, 'App\\Models\\Fructification');
            $variety_tubers_at_harvest = $this->getVarietyWhereOptions($request->selectedFiltersTubersAtHarvest, 'App\\Models\\TubersAtHarvest');
            $variety_sprout = $this->getVarietyWhereOptions($request->selectedFiltersSprout, 'App\\Models\\Sprout');

            return array_merge($variety_flowering, $variety_fructation, $variety_tubers_at_harvest, $variety_sprout);
        }

        return Variety::with('farmer.community.district.province.region')->get()->toArray();
    }
    public function getVarietyWhereOptions(array $options, $model)
    {
        $varieties_array = array();
        $choices = Choice::all();
        foreach ($options as $key => $optionsSelected) {
            foreach ($optionsSelected as $optionKey => $optionvalue) {
                $choice = $choices->where('label_spanish', $optionvalue)->first();

                if($choice){
                    $variety_ids =  $model::with('variety')->where($key, $choice->id)->pluck('variety_id');
                    $varieties =  Variety::with('farmer.community.district.province.region')->whereIn('id', $variety_ids)->get()->toArray();
                    $varieties_array = array_merge($varieties_array,$varieties);

                } else {
                    $variety_ids =  $model::with('variety')->where($key, $optionvalue)->pluck('variety_id');

                    $varieties =  Variety::with('farmer.community.district.province.region')->whereIn('id', $variety_ids)->get()->toArray();
                    $varieties_array = array_merge($varieties_array, $varieties);
                }
            }
        }

        return $varieties_array;
    }

    public function getChoiceLabel(array $labels, $columns)
    {
        foreach ($labels as $key => $value) {
            $choice = Choice::where('list_name', $key)->where('value', intval($columns[$key]))->first();

            if ($choice) {
                $columns[$key]= $choice->label_spanish;
            }
        }
        return $columns;
    }
}
