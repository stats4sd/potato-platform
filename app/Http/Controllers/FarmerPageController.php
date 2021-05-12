<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerPageController extends Controller
{
    
    public function index()
    {
        $farmers =  Farmer::with('varieties')->get();
       
        return view('farmer');
    }
}
