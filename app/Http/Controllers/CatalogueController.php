<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Variety;

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
        $tubersAtHarvest =  $variety->TubersAtHarvests->first();


        //Could refactor this to hold variable names and labels in a database table...
        $floweringLabels = [
            'plant_growth' => 'Habito de crecimiento de la planta',
            'leaf_dissection' => 'Tipo de la disección de la hoja',
            'number_lateral_leaflets' => 'Número de foliolos laterales de la hoja',
            'number_intermediate_leaflets' => 'Número de inter-hojuelas entre foliolos laterales',
            'number_leaflets_on_petioles' => 'Número de inter-hojuelas sobre peciolulos',
            'color_stem' => 'Color de tallo de esta planta',
            'shape_stem_wings' => 'Forma de las alas del tallo',

            'degree_flowering_plant' => 'Grado de floracion de esta planta',
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
            'color_berries' => 'Color de las baya',
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
            'color_secondary_tuber_pulp' => 'Color secundario',
            'distribution_color_secodary_tuber_pulp' => 'Distribución del color secundario',

            'level_tolerance_late_blight' => 'Nivel de tolerancia a la rancha',
            'level_tolerance_weevil' => 'Nivel de tolerancia al gorgojo de los andes',
            'level_tolerance_hailstorms' => 'Nivel de tolerancia a la granizada',
            'level_tolerance_frost' => 'Nivel de tolerancia a la helada',
            'level_tolerance_drought' => 'Nivel de tolerancia a la sequía',

        ];






        return response()->json([
            'values' => [
                'fruits'=> $fruits,
                'flowering' => $flowering,
                'sprouts' => $sprouts,
                'tubersAtHarvest' => $tubersAtHarvest,
            ],
            'labels' => [
                'fruits' => $fruitsLabels,
                'flowering' => $floweringLabels,
                'sprouts' => $sproutsLabels,
                'tubersAtHarvest' => $tubersAtHarvestLabels,
            ],
        ]);
    }
}
