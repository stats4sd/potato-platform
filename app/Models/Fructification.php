<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Fructification extends Model implements HasMedia
{
    use CrudTrait, HasFactory, InteractsWithMedia;

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
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('FructificationImages');
    }

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
