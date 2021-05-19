<?php

namespace App\Http\Controllers\Api;

use App\Models\Variety;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VarietyController extends Controller
{
    public function index()
    {
        $varieties =  Variety::whereHas('flowerings')->whereHas('fructifications')
        ->whereHas('tubersAtHarvests')->whereHas('sprouts')->with('farmer.community.district.province.region')
        ->with('flowerings.choicePlantGrowth', 
        'flowerings.choiceLeafDissection',
        'flowerings.choiceNumberLateralLeaflets',
        'flowerings.choiceNumberIntermediateLeaflets',
        'flowerings.choiceNumberLeafletsOnPetioles',
        'flowerings.choiceColorStem',
        'flowerings.choiceShapeStemWings',
        'flowerings.choiceDegreeFloweringPlant',
        'flowerings.choiceShapeCorolla',
        'flowerings.choiceColorPredominantFlower',
        'flowerings.choiceIntensityColorPredominantFlower',
        'flowerings.choiceColorSecondaryFlower',
        'flowerings.choiceDistributionColorSecodaryFlower',
        'flowerings.choicePigmentationAnthers',
        'flowerings.choicePigmentationPistil',
        'flowerings.choiceColorChalice',
        'flowerings.choiceColorPedicel',
        'flowerings.choiceLevelToleranceLateBlight',
        'flowerings.choiceLevelToleranceHailstorms',
        'flowerings.choiceLevelToleranceFrost',
        'flowerings.choiceLevelToleranceDrought',
        'flowerings.choiceCampana',
        )
        ->with('fructifications.choiceColorBerries', 
        'fructifications.choiceShapeBerry',
        'fructifications.choiceMaturityVariety',
        'fructifications.choiceCampana',
        'fructifications.choiceBerries',
        )
        ->with('tubersAtHarvests.choiceColorPredominantTuber', 
        'tubersAtHarvests.choiceIntensityColorPredominantTuber',
        'tubersAtHarvests.choiceColorSecondaryTuber',
        'tubersAtHarvests.choiceDistributionColorSecodaryTuber',
        'tubersAtHarvests.choiceShapeTuber',
        'tubersAtHarvests.choiceVariantShapeTuber',
        'tubersAtHarvests.choiceDepthTuberEyes',
        'tubersAtHarvests.choiceColorPredominantTuberPulp',
        'tubersAtHarvests.choiceColorSecondaryTuberPulp',
        'tubersAtHarvests.choiceDistributionColorSecodaryTuberPulp',
        'tubersAtHarvests.choiceLevelToleranceLateBlight',
        'tubersAtHarvests.choiceLevelToleranceWeevil',
        'tubersAtHarvests.choiceLevelToleranceHailstorms',
        'tubersAtHarvests.choiceLevelToleranceFrost',
        'tubersAtHarvests.choiceLevelToleranceDrought',
        )
        ->with('sprouts.choiceColorPredominantTuberShoot',
        'sprouts.choiceColorSecondaryTuberShoot',
        'sprouts.choiceDistributionColorSecodaryTuberShoot',
        'sprouts.choiceCampana',
        )->get();

        return $varieties->toJson();
    }
}
