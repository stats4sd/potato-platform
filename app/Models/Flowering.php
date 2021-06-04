<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Flowering extends Model implements HasMedia
{
    use CrudTrait, HasFactory, InteractsWithMedia;

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
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('FloweringImages');
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

    public function choicePlantGrowth()
    {
        return $this->belongsTo(Choice::class, 'plant_growth');
    }

    public function choiceLeafDissection()
    {
        return $this->belongsTo(Choice::class, 'leaf_dissection');
    }

    public function choiceNumberLateralLeaflets()
    {
        return $this->belongsTo(Choice::class, 'number_lateral_leaflets');
    }
    public function choiceNumberIntermediateLeaflets()
    {
        return $this->belongsTo(Choice::class, 'number_intermediate_leaflets');
    }
    public function choiceNumberLeafletsOnPetioles()
    {
        return $this->belongsTo(Choice::class, 'number_leaflets_on_petioles');
    }
    public function choiceColorStem()
    {
        return $this->belongsTo(Choice::class, 'color_stem');        
    }
    public function choiceShapeStemWings()
    {
        return $this->belongsTo(Choice::class, 'shape_stem_wings');
    }
    public function choiceDegreeFloweringPlant()
    {
        return $this->belongsTo(Choice::class, 'degree_flowering_plant');
    }
    public function choiceShapeCorolla()
    {
        return $this->belongsTo(Choice::class, 'shape_corolla');
    }
    public function choiceColorPredominantFlower()
    {
        return $this->belongsTo(Choice::class, 'color_predominant_flower');
    }
    public function choiceIntensityColorPredominantFlower()
    {
        return $this->belongsTo(Choice::class, 'intensity_color_predominant_flower');
    }
    public function choiceColorSecondaryFlower()
    {
        return $this->belongsTo(Choice::class, 'color_secondary_flower');
    }
    public function choiceDistributionColorSecodaryFlower()
    {
        return $this->belongsTo(Choice::class, 'distribution_color_secodary_flower');
    }
    public function choicePigmentationAnthers()
    {
        return $this->belongsTo(Choice::class, 'pigmentation_anthers');
    }
    public function choicePigmentationPistil()
    {
        return $this->belongsTo(Choice::class, 'pigmentation_pistil');
    }
    public function choiceColorChalice()
    {
        return $this->belongsTo(Choice::class, 'color_chalice');
    }
        
    public function choiceColorPedicel()
    {
        return $this->belongsTo(Choice::class, 'color_pedicel');
    }
        
    public function choiceLevelToleranceLateBlight()
    {
        return $this->belongsTo(Choice::class, 'level_tolerance_late_blight');
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
    public function choiceCampana()
    {
    return $this->belongsTo(Choice::class, 'number_leaflets_on_petioles');        
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
