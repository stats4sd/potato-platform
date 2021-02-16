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
        $fructification =  DB::table('fructification')->where('variety_id','=',$request->variety_id['variedad'])->get();
        $flowering =  DB::table('flowering')->where('variety_id','=',$request->variety_id['variedad'])->get();

        $sprouts =  DB::table('sprouts')->where('variety_id','=',$request->variety_id['variedad'])->get();

        $tubers_at_harvest =  DB::table('tubers_at_harvest')->where('variety_id','=',$request->variety_id['variedad'])->get();
       
        return response()->json([
            'fructification'=> $fructification,
            'flowering' => $flowering,
            'sprouts' => $sprouts,
            'tubers_at_harvest' => $tubers_at_harvest,
        ]);
    }
}
