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
    protected $guarded = [];
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
        return $this->hasMany(HhMember::class);
    }

    public function farmer_organisations()
    {
        return $this->belongsToMany(FarmerOrganisation::class);
    }

    public function farmers_sales()
    {
        return $this->hasMany(FarmersSale::class);
    }

    public function production_systems()
    {
        return $this->hasMany(ProductionSystem::class);
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
