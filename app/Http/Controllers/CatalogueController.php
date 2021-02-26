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

        $fructification = $variety->fructifications;
        $flowering =  $variety->flowerings;
        $sprouts =  $variety->sprouts;
        $tubers_at_harvest =  $variety->TubersAtHarvests;

        return response()->json([
            'fructification'=> $fructification,
            'flowering' => $flowering,
            'sprouts' => $sprouts,
            'tubers_at_harvest' => $tubers_at_harvest,
        ]);
    }
}
