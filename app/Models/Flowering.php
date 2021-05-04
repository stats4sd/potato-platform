<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flowering extends Model
{
    use CrudTrait, HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'flowering';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
    ];

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
    public function setPhotoLeafAttribute($value)
    {
        $attribute_name = "photo_leaf";
        $disk = "public";
        $destination_path = "flowering";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setPhotoFlowerAttribute($value)
    {
        $attribute_name = "photo_flower";
        $disk = "public";
        $destination_path = "flowering";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setPhotoPlantAttribute($value)
    {
        $attribute_name = "photo_plant";
        $disk = "public";
        $destination_path = "flowering";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
