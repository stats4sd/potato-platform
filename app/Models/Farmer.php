<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Farmer extends Model
{
    use CrudTrait, HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'farmers';
    protected $guarded = [];
    public $incrementing = false;
    // protected $appends = ['community_name', 'district_name', 'province_name', 'region_name'];


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
    // public function getCountVarietiesAttribute()
    // {
    //     return $this->varieties ? $this->varieties->count() : 0;
    // }

    public function getCommunityNameAttribute()
    {
        return $this->community ? $this->community->name : null; 
    }

    public function getDistrictNameAttribute()
    {
        return $this->community->district ? $this->community->district->name : null;
    }

    public function getProvinceNameAttribute()
    {
        return $this->community->district->province ? $this->community->district->province->name : null;
    }

    public function getRegionNameAttribute()
    {
        return $this->community->district->province->region ? $this->community->district->province->region->name : null;
    }



    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setPhotoAttribute($value)
    {
        $attribute_name = "photo";
        $disk = "public";
        $destination_path = "farmers";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
