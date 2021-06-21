<?php

namespace App\Http\Controllers\Api;

use App\Models\Choice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChoiceController extends Controller
{
    public function index()
    {
        $campanas = Choice::where('list_name', 'campana')->get();

        return $campanas->toJson();
    }
}
