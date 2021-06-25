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
    public function getVarietyDetails(Request $request)
    {
        $variety = Variety::find($request->variety_id);

        // EVENTUALLY, we will have to reconcile the possibility of having multiple subtable records for a single variety. For now, just take the first entry...
        $fruits = $variety->fructifications->first()->load(
            'choiceColorBerries',
            'choiceShapeBerry',
            'choiceMaturityVariety',
            'choiceCampana',
            'choiceBerries',
        );


        $flowerings =  $variety->flowerings->first()->load(
            'choicePlantGrowth',
            'choiceLeafDissection',
            'choiceNumberLateralLeaflets',
            'choiceNumberIntermediateLeaflets',
            'choiceNumberLeafletsOnPetioles',
            'choiceColorStem',
            'choiceShapeStemWings',
            'choiceDegreeFloweringPlant',
            'choiceShapeCorolla',
            'choiceColorPredominantFlower',
            'choiceIntensityColorPredominantFlower',
            'choiceColorSecondaryFlower',
            'choiceDistributionColorSecodaryFlower',
            'choicePigmentationAnthers',
            'choicePigmentationPistil',
            'choiceColorChalice',
            'choiceColorPedicel',
            'choiceLevelToleranceLateBlight',
            'choiceLevelToleranceHailstorms',
            'choiceLevelToleranceFrost',
            'choiceLevelToleranceDrought',
            'choiceCampana',
        );


        $sprouts =  $variety->sprouts->first()->load(
            'choiceColorPredominantTuberShoot',
            'choiceColorSecondaryTuberShoot',
            'choiceDistributionColorSecodaryTuberShoot',
            'choiceCampana',
        );

        $tubersAtHarvest =  $variety->tubersAtHarvests->first()->load(
            'choiceColorPredominantTuber',
            'choiceIntensityColorPredominantTuber',
            'choiceColorSecondaryTuber',
            'choiceDistributionColorSecodaryTuber',
            'choiceShapeTuber',
            'choiceVariantShapeTuber',
            'choiceDepthTuberEyes',
            'choiceColorPredominantTuberPulp',
            'choiceColorSecondaryTuberPulp',
            'choiceDistributionColorSecodaryTuberPulp',
            'choiceLevelToleranceLateBlight',
            'choiceLevelToleranceWeevil',
            'choiceLevelToleranceHailstorms',
            'choiceLevelToleranceFrost',
            'choiceLevelToleranceDrought',
        );

        $farmer = Farmer::where('id', $variety->first()->farmer_id)->withCount('varieties')->with('community.district.province.region')->first();

        //Could refactor this to hold variable names and labels in a database table...
        $farmerLabels = [
            'name' => 'Guardián',
            'community' => 'Comunidad',
            'district' => 'Distrito',
            'province' => 'Provincia',
            'region' => 'Región',
            'aguapan_year' => 'Pertenece a AGUAPAN desde',
            'varieties_count' => 'Número de variedades en la base de datos'
        ];

        $floweringsLabels = [
            'choice_plant_growth' => 'Habito de crecimiento de la planta',
            'choice_color_stem' => 'Color de tallo',
            'choice_shape_stem_wings' => 'Forma de las alas del tallo',

            'choice_leaf_dissection' => 'Tipo de la disección de la hoja',
            'choice_number_lateral_leaflets' => 'Número de foliolos laterales de la hoja',
            'choice_number_intermediate_leaflets' => 'Número de inter-hojuelas entre foliolos laterales',
            'choice_number_leaflets_on_petioles' => 'Número de inter-hojuelas sobre peciolulos',

            'choice_degree_flowering_plant' => 'Grado de floracion',
            'choice_shape_corolla' => 'Forma de la corola',
            'choice_color_predominant_flower' => 'Color predominante de la flor',
            'choice_intensity_color_predominant_flower' => 'Intensidad de color predominante de la flor',
            'choice_color_secondary_flower' => 'Color secundario de la flor',
            'choice_distribution_color_secodary_flower' => 'Distribución del color secundario de la flor',
            'choice_pigmentation_anthers' => 'Pigmentación de las anteras',
            'choice_pigmentation_pistil' => 'Pigmentación en el pistilo',
            'choice_color_chalice' => 'Color del cáliz',
            'choice_color_pedicel' => 'Color del pedicelo',

            'choice_level_tolerance_late_blight' => 'Nivel de tolerancia a la rancha',
            'choice_level_tolerance_hailstorms' => 'Nivel de tolerancia a la granizada',
            'choice_level_tolerance_frost' => 'Nivel de tolerancia a la helada',
            'choice_level_tolerance_drought' => 'Nivel de tolerancia a la sequía',
        ];

        $fruitsLabels = [
            'choice_berries' => 'Bayas',
            'choice_color_berries' => 'Color de la baya',
            'choice_shape_berry' => 'Forma de la baya',
            'choice_maturity_variety' => 'La madurez',
        ];

        $sproutsLabels = [
            'choice_color_predominant_tuber_shoot' => 'Color predominante',
            'choice_color_secondary_tuber_shoot' => 'Color secundario',
            'choice_distribution_color_secodary_tuber_shoot' => 'Distribución del color secundario',
        ];

        $tubersAtHarvestLabels = [
            'choice_color_predominant_tuber' => 'Color predominante',
            'choice_intensity_color_predominant_tuber' => 'Intensidad del color predominante',
            'choice_color_secondary_tuber' => 'Color secundario',
            'choice_distribution_color_secodary_tuber' => 'Distribución del color secundario',
            'choice_shape_tuber' => 'Forma general',
            'choice_variant_shape_tuber' => 'Variante de forma',
            'choice_depth_tuber_eyes' => 'Profundidad de los ojos',
            'choice_color_predominant_tuber_pul' => 'Color predominante de la pulpa',
            'choice_color_secondary_tuber_pulp' => 'Color secundario de la pulpa',
            'choice_distribution_color_secodary_tuber_pulp' => 'Distribución del color secundario de la pulpa',
            'number_tubers_plant' => 'Número de tubérculos por planta',
            'yield_plant' => 'Rendimiento por planta en kg',

            'choice_level_tolerance_late_blight' => 'Nivel de tolerancia a la rancha',
            'choice_level_tolerance_weevil' => 'Nivel de tolerancia al gorgojo de los andes',
            'choice_level_tolerance_hailstorms' => 'Nivel de tolerancia a la granizada',
            'choice_level_tolerance_frost' => 'Nivel de tolerancia a la helada',
            'choice_level_tolerance_drought' => 'Nivel de tolerancia a la sequía',

        ];



        return response()->json([
            'values' => [
                'fruits'=> $fruits,
                'flowerings' => $flowerings,
                'sprouts' => $sprouts,
                'tubersAtHarvest' => $tubersAtHarvest,
                'farmer' => $farmer,
            ],
            'labels' => [
                'fruits' => $fruitsLabels,
                'flowerings' => $floweringsLabels,
                'sprouts' => $sproutsLabels,
                'tubersAtHarvest' => $tubersAtHarvestLabels,
                'farmer' => $farmerLabels,
            ],
        ]);
    }
}
