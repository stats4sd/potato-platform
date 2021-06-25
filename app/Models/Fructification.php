<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fructification extends Model
{
    use CrudTrait, HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'fructification';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }

    public function choiceColorBerries()
    {
        return $this->belongsTo(Choice::class, 'color_berries');
    }

    public function choiceShapeBerry()
    {
        return $this->belongsTo(Choice::class, 'shape_berry');
    }

    public function choiceMaturityVariety()
    {
        return $this->belongsTo(Choice::class, 'maturity_variety');
    }

    public function choiceCampana()
    {
        return $this->belongsTo(Choice::class, 'campana');
    }

    public function choiceBerries()
    {
        return $this->belongsTo(Choice::class, 'berries');
    }



    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setPhotoBerryAttribute($value)
    {
        $attribute_name = "photo_berry";
        $disk = "public";
        $destination_path = "fructification";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
