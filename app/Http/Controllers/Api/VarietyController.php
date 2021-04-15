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
        $varieties =  Variety::with('farmer.community.district.province.region')->where('id','not like','%'.'.'.'%')->get();

        return $varieties->toJson();
    }
}
