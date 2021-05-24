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
        ->whereHas('tubersAtHarvests')->whereHas('sprouts')
        ->with('flowerings')
        ->with('fructifications')
        ->with('tubersAtHarvests')
        ->with('sprouts')
        ->with('farmer.community.district.province.region')->get();
      
        return $varieties->toJson();
    }
}
