<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TubersAtHarvest extends Model implements HasMedia
{
    use CrudTrait, HasFactory, InteractsWithMedia;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'tubers_at_harvest';
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
        $this->addMediaCollection('TuberAtHarvestImages');
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

    public function choiceColorPredominantTuber()
    {
        return $this->belongsTo(Choice::class, 'color_predominant_tuber');
    }

    public function choiceIntensityColorPredominantTuber()
    {
        return $this->belongsTo(Choice::class, 'intensity_color_predominant_tuber');
    }

    public function choiceColorSecondaryTuber()
    {
        return $this->belongsTo(Choice::class, 'color_secondary_tuber');
    }

    public function choiceDistributionColorSecodaryTuber()
    {
        return $this->belongsTo(Choice::class, 'distribution_color_secodary_tuber');
    }

    public function choiceShapeTuber()
    {
        return $this->belongsTo(Choice::class, 'shape_tuber');
    }

    public function choiceVariantShapeTuber()
    {
        return $this->belongsTo(Choice::class, 'variant_shape_tuber');
    }

    public function choiceDepthTuberEyes()
    {
        return $this->belongsTo(Choice::class, 'depth_tuber_eyes');
    }

    public function choiceColorPredominantTuberPulp()
    {
        return $this->belongsTo(Choice::class, 'color_predominant_tuber_pulp');
    }

    public function choiceColorSecondaryTuberPulp()
    {
        return $this->belongsTo(Choice::class, 'color_secondary_tuber_pulp');
    }

    public function choiceDistributionColorSecodaryTuberPulp()
    {
        return $this->belongsTo(Choice::class, 'distribution_color_secodary_tuber_pulp');
    }

    public function choiceLevelToleranceLateBlight()
    {
        return $this->belongsTo(Choice::class, 'level_tolerance_late_blight');
    }
    public function choiceLevelToleranceWeevil()
    {
        return $this->belongsTo(Choice::class, 'level_tolerance_weevil');
    }

    public function choiceLevelToleranceHailstorms()
    {
        return $this->belongsTo(Choice::class, 'level_tolerance_hailstorms');
    }

    public function choiceLevelToleranceFrost()
    {
        return $this->belongsTo(Choice::class, 'level_tolerance_frost');
    }

    public function choiceLevelToleranceDrought()
    {
        return $this->belongsTo(Choice::class, 'level_tolerance_drought');
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
    public function setPhotoTuberAttribute($value)
    {
        $attribute_name = "photo_tuber";
        $disk = "public";
        $destination_path = "tubers_at_harvest";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
