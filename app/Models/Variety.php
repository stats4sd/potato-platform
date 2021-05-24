<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variety extends Model
{
    use CrudTrait, HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'varieties';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = [];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    public $incrementing = false;
    protected $casts = [
        'files' => 'array'
    ];
    // protected $appends = ['community'];

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
    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function flowerings()
    {
        return $this->hasMany(Flowering::class);
    }

    public function fructifications()
    {
        return $this->hasMany(Fructification::class);
    }

    public function tubersAtHarvests()
    {
        return $this->hasMany(TubersAtHarvest::class);
    }

    public function sprouts()
    {
        return $this->hasMany(Sprout::class);
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
    // public function getCommunityAttribute()
    // {
    //     return $this->farmer->community->name;
    // }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setFilesAttribute($value)
    {
        $attribute_name = "files";
        $disk = "public";
        $destination_path = "varities";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
