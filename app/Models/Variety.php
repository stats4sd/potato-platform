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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
