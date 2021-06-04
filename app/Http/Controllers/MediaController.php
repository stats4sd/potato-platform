<?php

namespace App\Http\Controllers;

use App\Models\Flowering;
use App\Models\Fructification;
use App\Models\Sprout;
use App\Models\TubersAtHarvest;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $flowering = Flowering::where('variety_id', $request->varietyId)->where('campana', $request->selectedCampana)->first();
        $flowering->syncFromMediaLibraryRequest($request->flowering)->toMediaCollection('flowering');

        $fructification = Fructification::where('variety_id', $request->varietyId)->where('campana',$request->selectedCampana)->first();
        $fructification->syncFromMediaLibraryRequest($request->fructification)->toMediaCollection('fructification');

        $tubers_at_harvest = TubersAtHarvest::where('variety_id', $request->varietyId)->where('campana',$request->selectedCampana)->first();
        $tubers_at_harvest->syncFromMediaLibraryRequest($request->tubers_at_harvest)->toMediaCollection('tubers_at_harvest');

        $sprout = Sprout::where('variety_id', $request->varietyId)->where('campana',$request->selectedCampana)->first();
        $sprout->syncFromMediaLibraryRequest($request->sprout)->toMediaCollection('sprout');

        if($flowering){
            $floweringImages= $flowering->getMedia('flowering');
        }

        if($fructification){
            $fructificationImages= $fructification->getMedia('fructification');
        }

        if($tubers_at_harvest){
            $tubersAtHarvestImages= $tubers_at_harvest->getMedia('tubers_at_harvest');
        }

        if($sprout){
            $sproutImages= $sprout->getMedia('sprout');
        }

        // return response()->json([
        //    'floweringImages' => $floweringImages,
        //    'fructificationImages' => $fructificationImages,
        //    'tubersAtHarvestImages' => $tubersAtHarvestImages,
        //    'sproutImages' => $sproutImages
        //    ]);
           return back()->with('floweringImages', $floweringImages);
   
    }
}
