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
        $fructification = $variety->fructifications->first();
        $flowering =  $variety->flowerings->first();
        $sprouts =  $variety->sprouts->first();
        $tubers_at_harvest =  $variety->TubersAtHarvests->first();


        return response()->json([
            'fructification'=> $fructification,
            'flowering' => $flowering,
            'sprouts' => $sprouts,
            'tubers_at_harvest' => $tubers_at_harvest,
        ]);
    }
}
