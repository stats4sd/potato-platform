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
<<<<<<< HEAD
        $varieties =  Variety::with('farmer.community.district.province.region')->get();

=======
        
        $varieties =  DB::table('varieties')->selectRaw('varieties.name as variedad, farmers.name as agricultor, regions.name as región')
                        ->join('farmers', 'varieties.farmer_id', '=', 'farmers.id')
                        ->join('communities', 'farmers.community_id', '=', 'communities.id')
                        ->join('districts', 'communities.district_id', '=', 'districts.id')
                        ->join('provinces', 'districts.province_id', '=', 'provinces.id')
                        ->join('regions', 'provinces.region_id', '=', 'regions.id')
                        ->get();
       
>>>>>>> dev
        return $varieties->toJson();
    }
}
