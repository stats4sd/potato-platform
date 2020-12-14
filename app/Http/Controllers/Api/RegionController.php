<?php

namespace App\Http\Controllers\Api;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    public function index()
    {
        // $regions = DB::table('regions')->select('id', 'name')->get();
        $regions = Region::select('id', 'name')->get();

        return $regions->toJson();
    }

}
