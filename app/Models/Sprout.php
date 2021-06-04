<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sprout extends Model implements HasMedia
{
    use CrudTrait, HasFactory, InteractsWithMedia;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'sprouts';
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
        $this->addMediaCollection('SproutImages');
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

    public function choiceColorPredominantTuberShoot()
    {
        return $this->belongsTo(Choice::class, 'color_predominant_tuber_shoot');
    }

    public function choiceColorSecondaryTuberShoot()
    {
        return $this->belongsTo(Choice::class, 'color_secondary_tuber_shoot');
    }

    public function choiceDistributionColorSecodaryTuberShoot()
    {
        return $this->belongsTo(Choice::class, 'distribution_color_secodary_tuber_shoot');
    }

    public function choiceCampana()
    {
        return $this->belongsTo(Choice::class, 'campana');
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
    public function setPhotoTuberShootAttribute($value)
    {
        $attribute_name = "photo_tuber_shoot";
        $disk = "public";
        $destination_path = "sprouts";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
