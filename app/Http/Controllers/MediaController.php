<?php

namespace App\Http\Controllers;

use App\Models\Sprout;
use App\Models\Variety;
use App\Models\Flowering;
use Illuminate\Http\Request;
use App\Models\Fructification;
use App\Models\TubersAtHarvest;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $variety = Variety::find($request->varietyId);
        $variety->syncFromMediaLibraryRequest($request->flowerings)->withCustomProperties('name', 'photo_type','campana','public')->toMediaCollection('flowerings');
        $variety->syncFromMediaLibraryRequest($request->fructifications)->withCustomProperties('name', 'photo_type','campana','public')->toMediaCollection('fructifications');
        $variety->syncFromMediaLibraryRequest($request->tuber_at_harvests)->withCustomProperties('name', 'photo_type','campana','public')->toMediaCollection('tuber_at_harvests');
        $variety->syncFromMediaLibraryRequest($request->sprouts)->withCustomProperties('name', 'photo_type','campana','public')->toMediaCollection('sprouts');

        return redirect('/upload-images')->with('success', 'Photos sucessed save!');
    }

    public function getVarietyImages(Request $request)
    {
        $variety = Variety::findOrFail($request->variety_id);
        $sproutImages = null;
        $floweringImages = null;
        $fructificationImages = null;
        $tubersAtHarvestImages = null;
        $sproutImages = null;

        

        if($variety->getMedia('flowerings')){
            $floweringImages = $variety->getMedia('flowerings');
        }

        if($variety->getMedia('fructifications')){
            $fructificationImages = $variety->getMedia('fructifications');
        }

        if($variety->getMedia('tuber_at_harvests')){
            $tubersAtHarvestImages = $variety->getMedia('tuber_at_harvests');
        }

        if($variety->getMedia('sprouts')){
            $sproutImages = $variety->getMedia('sprouts');
        }


        return response()->json([
            'floweringImages' => $floweringImages,
            'fructificationImages' => $fructificationImages,
            'tubersAtHarvestImages' => $tubersAtHarvestImages,
            'sproutImages' =>  $sproutImages,
        ]);
    }
}
