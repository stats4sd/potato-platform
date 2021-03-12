<?php

namespace App\Http\Controllers\Api;

use App\Models\Variety;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Models\Flowering;
use Illuminate\Support\Facades\DB;

class ParameterFilterController extends Controller
{
    public function index()
    { 
        $columns = array('Plant growth'=>'plant_growth', 'Leaf dissection'=>'leaf_dissection', 
        'Number lateral leaflets'=>'number_lateral_leaflets', 
        'Number intermediate leaflets'=>'number_intermediate_leaflets', 
        'Number leaflets on petioles'=>'number_leaflets_on_petioles');
        $data=[];
        foreach ($columns as $key_column => $column) {
            $flowering =  Flowering::all()->pluck($column)->unique();
            $column_data['label']= $key_column;
            $column_data['value']= $column;
            $column_data['options'] = $flowering;
        
            foreach ($column_data['options'] as $key => $value) {
                $choice = Choice::find($value);
                if($choice){
                    $column_data['options'][$key]= $choice->label_spanish;
                } else {
                    $column_data['options'][$key]= $value;
                }
            }
            $data[] = $column_data;
        }

        return $data;
    }
}
