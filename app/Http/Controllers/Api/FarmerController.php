<?php

namespace App\Http\Controllers\Api;

use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmerController extends Controller
{
    public function index()
    {
        $farmers =  Farmer::select('id', 'name')->get();

        return $farmers->toJson();
    }
}
