<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerPageController extends Controller
{
    
    public function index($id)
    {
        $farmer =  Farmer::with(['varieties'])->find($id);

        return view('farmer');
    }
}
