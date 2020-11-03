<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'farmers';
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
    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function varieties()
    {
        return $this->hasMany(Variety::class);
    }
    public function hh_members()
    {
        return $this->hasMany(Hh_member::class);
    }

    public function farner_organisations()
    {
        return $this->hasMany(Farmer_organisation::class);
    }

    public function market_info()
    {
        return $this->hasMany(Market_info::class);
    }

    public function production_systems()
    {
        return $this->hasMany(Production_system::class);
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
