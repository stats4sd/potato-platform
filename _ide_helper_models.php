<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Community
 *
 * @property int $id
 * @property int $district_id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\District $district
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Farmer[] $farmers
 * @property-read int|null $farmers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Community newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Community newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Community query()
 * @method static \Illuminate\Database\Eloquent\Builder|Community whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Community whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Community whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Community whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Community whereUpdatedAt($value)
 */
	class Community extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DataMap
 *
 * @property string $id
 * @property string $title
 * @property int $location
 * @property string|null $repeat_group the name of the repeat group to look inside to find the main variables for this data map
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variable[] $variables
 * @property-read int|null $variables_count
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereRepeatGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataMap whereUpdatedAt($value)
 */
	class DataMap extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\District
 *
 * @property int $id
 * @property string|null $name
 * @property int $province_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Community[] $communities
 * @property-read int|null $communities_count
 * @property-read \App\Models\Province $province
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Farmer
 *
 * @property string $id
 * @property int $community_id
 * @property string|null $farmhouse
 * @property string $latitude
 * @property string $longitude
 * @property string $altitude
 * @property string|null $name
 * @property string|null $DNI
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $education
 * @property int|null $read_write
 * @property string|null $languages
 * @property string|null $language_prefered
 * @property string|null $marital_status
 * @property string|null $phone
 * @property string|null $email
 * @property int|null $whatsapp
 * @property string|null $phone_other
 * @property string|null $aguapan_year
 * @property mixed|null $economic_activity
 * @property string|null $main_activity
 * @property string|null $partner_name
 * @property int|null $partner_birth
 * @property string|null $partner_education
 * @property int|null $children_school_age
 * @property string|null $agricultural_focus
 * @property string|null $activity_agriculture
 * @property string|null $activity_livestock
 * @property string|null $production_destination
 * @property int|null $number_hh
 * @property string|null $material
 * @property int|null $energy
 * @property int|null $water
 * @property int|null $drainage
 * @property int|null $phone_signal
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Community $community
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FarmerOrganisation[] $farmer_organisations
 * @property-read int|null $farmer_organisations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FarmersSale[] $farmers_sales
 * @property-read int|null $farmers_sales_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HhMember[] $hh_members
 * @property-read int|null $hh_members_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductionSystem[] $production_systems
 * @property-read int|null $production_systems_count
 * @property-read \App\Models\Submission $submission
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variety[] $varieties
 * @property-read int|null $varieties_count
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereActivityAgriculture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereActivityLivestock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereAgriculturalFocus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereAguapanYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereChildrenSchoolAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereCommunityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereDNI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereDrainage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereEconomicActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereEnergy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereFarmhouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereLanguagePrefered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereMainActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereNumberHh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer wherePartnerBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer wherePartnerEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer wherePartnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer wherePhoneOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer wherePhoneSignal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereProductionDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereReadWrite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereWater($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereWhatsapp($value)
 */
	class Farmer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FarmerOrganisation
 *
 * @property int $id
 * @property string $farmer_id
 * @property string|null $name
 * @property string|null $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Farmer[] $farmers
 * @property-read int|null $farmers_count
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerOrganisation whereYear($value)
 */
	class FarmerOrganisation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FarmersSale
 *
 * @property int $id
 * @property string $farmer_id
 * @property string|null $quantity_sold
 * @property mixed|null $place_sale
 * @property string|null $location_place
 * @property string|null $form_sale
 * @property mixed|null $sold_to
 * @property string|null $use
 * @property string|null $price_consumption
 * @property string|null $price_seed
 * @property string|null $price_outside
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Farmer $farmer
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereFormSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereLocationPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale wherePlaceSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale wherePriceConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale wherePriceOutside($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale wherePriceSeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereQuantitySold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereSoldTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmersSale whereUse($value)
 */
	class FarmersSale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Flowering
 *
 * @property int $id
 * @property string $variety_id
 * @property string|null $plant_growth
 * @property string|null $leaf_dissection
 * @property string|null $number_lateral_leaflets
 * @property string|null $number_intermediate_leaflets
 * @property string|null $number_leaflets_on_petioles
 * @property string|null $color_stem
 * @property string|null $shape_stem_wings
 * @property string|null $degree_flowering_plant
 * @property string|null $shape_corolla
 * @property string|null $color_predominant_flower
 * @property string|null $intensity_color_predominant_flower
 * @property string|null $color_secondary_flower
 * @property string|null $distribution_color_secodary_flower
 * @property string|null $pigmentation_anthers
 * @property string|null $pigmentation_pistil
 * @property string|null $color_chalice
 * @property string|null $color_pedicel
 * @property array|null $photos
 * @property string|null $photo_flower
 * @property string|null $photo_plant
 * @property string|null $level_tolerance_late_blight
 * @property string|null $level_tolerance_hailstorms
 * @property string|null $level_tolerance_frost
 * @property string|null $level_tolerance_drought
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Variety $variety
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereColorChalice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereColorPedicel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereColorPredominantFlower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereColorSecondaryFlower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereColorStem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereDegreeFloweringPlant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereDistributionColorSecodaryFlower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereIntensityColorPredominantFlower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereLeafDissection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereLevelToleranceDrought($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereLevelToleranceFrost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereLevelToleranceHailstorms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereLevelToleranceLateBlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereNumberIntermediateLeaflets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereNumberLateralLeaflets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereNumberLeafletsOnPetioles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering wherePhotoFlower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering wherePhotoPlant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering wherePigmentationAnthers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering wherePigmentationPistil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering wherePlantGrowth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereShapeCorolla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereShapeStemWings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flowering whereVarietyId($value)
 */
	class Flowering extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Fructification
 *
 * @property int $id
 * @property string $variety_id
 * @property string|null $color_berries
 * @property string|null $shape_berry
 * @property string|null $maturity_variety
 * @property string|null $photo_berry
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Variety $variety
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification whereColorBerries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification whereMaturityVariety($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification wherePhotoBerry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification whereShapeBerry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fructification whereVarietyId($value)
 */
	class Fructification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HhMember
 *
 * @property int $id
 * @property string $farmer_id
 * @property string|null $name
 * @property string|null $relationship
 * @property string|null $gender
 * @property string|null $birth_date
 * @property int|null $age
 * @property string|null $education
 * @property int|null $helps_farm
 * @property string|null $months
 * @property string|null $days
 * @property string|null $hours
 * @property string|null $main_job
 * @property int|null $is_payed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Farmer $farmer
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereHelpsFarm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereIsPayed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereMainJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereMonths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HhMember whereUpdatedAt($value)
 */
	class HhMember extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Plot
 *
 * @property int $id
 * @property int $production_system_id
 * @property string|null $type
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $altitude
 * @property string|null $tillage
 * @property string|null $land_prep
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductionSystem $production_system
 * @method static \Illuminate\Database\Eloquent\Builder|Plot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereAltitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereLandPrep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereProductionSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereTillage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plot whereUpdatedAt($value)
 */
	class Plot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductionSystem
 *
 * @property int $id
 * @property string $farmer_id
 * @property int|null $varieties_harinosa
 * @property int|null $varieties_amarga
 * @property int|null $varieties_mejorada
 * @property mixed|null $crops
 * @property string|null $quantity_seed
 * @property string|null $unity_seed
 * @property string|null $area_sown
 * @property string|null $area_unity
 * @property int|null $plots_sown_this_season
 * @property string|null $quantity_organic_fert
 * @property string|null $type_organic_fert
 * @property string|null $quantity_urea
 * @property string|null $quantity_nitrato_amonio
 * @property string|null $quantity_fostafo_amonico
 * @property string|null $quantity_cloruro_potasa
 * @property string|null $quantity_mix_papa
 * @property string|null $other_fert_name
 * @property string|null $quantity_other_fert
 * @property int|null $labor_shortages_mix
 * @property int|null $labor_shortages_commercial
 * @property int|null $labor_shortages_bitter
 * @property int|null $labor_shortage_improved
 * @property int|null $labour_hired
 * @property mixed|null $activities_labour_hired
 * @property string|null $salary_labour_male
 * @property string|null $salary_labour_female
 * @property mixed|null $activities_ayni
 * @property mixed|null $pests
 * @property string|null $pests_control_before
 * @property string|null $pests_control_now
 * @property mixed|null $diseases
 * @property string|null $diseases_control_before
 * @property string|null $diseases_control_now
 * @property mixed|null $climatic_problems
 * @property string|null $measures_climatic_problems
 * @property string|null $quantity_mixed_potato_season
 * @property string|null $quantity_mixed_potato_season_unity
 * @property string|null $quantity_consumo
 * @property string|null $quantity_consumo_unity
 * @property string|null $quantity_chuno
 * @property string|null $quantity_chuno_unity
 * @property string|null $quantity_papa_seca
 * @property string|null $quantity_papa_seca_unity
 * @property string|null $quantity_tocosh
 * @property string|null $quantity_tocosh_unity
 * @property string|null $quantity_hojuelas
 * @property string|null $quantity_hojuelas_unity
 * @property string|null $quantity_otras_formas
 * @property string|null $quantity_otras_formas_unity
 * @property string|null $quantity_seeds_save
 * @property string|null $quantity_seeds_save_unity
 * @property string|null $quantity_exchange
 * @property string|null $quantity_exchange_unity
 * @property string|null $quantity_gift
 * @property string|null $quantity_gift_unity
 * @property string|null $quantity_family
 * @property string|null $quantity_family_unity
 * @property string|null $medicinal_varieties
 * @property string|null $illnesses_cured
 * @property string|null $quantity_sold
 * @property string|null $quantity_sold_unity
 * @property string|null $quantity_sold_normal
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Farmer $farmer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Plot[] $plots
 * @property-read int|null $plots_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereActivitiesAyni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereActivitiesLabourHired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereAreaSown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereAreaUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereClimaticProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereCrops($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereDiseases($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereDiseasesControlBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereDiseasesControlNow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereIllnessesCured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereLaborShortageImproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereLaborShortagesBitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereLaborShortagesCommercial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereLaborShortagesMix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereLabourHired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereMeasuresClimaticProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereMedicinalVarieties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereOtherFertName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem wherePests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem wherePestsControlBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem wherePestsControlNow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem wherePlotsSownThisSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityChuno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityChunoUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityCloruroPotasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityConsumo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityConsumoUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityExchange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityExchangeUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityFamilyUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityFostafoAmonico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityGift($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityGiftUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityHojuelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityHojuelasUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityMixPapa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityMixedPotatoSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityMixedPotatoSeasonUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityNitratoAmonio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityOrganicFert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityOtherFert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityOtrasFormas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityOtrasFormasUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityPapaSeca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityPapaSecaUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantitySeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantitySeedsSave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantitySeedsSaveUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantitySold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantitySoldNormal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantitySoldUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityTocosh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityTocoshUnity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereQuantityUrea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereSalaryLabourFemale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereSalaryLabourMale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereTypeOrganicFert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereUnitySeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereVarietiesAmarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereVarietiesHarinosa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductionSystem whereVarietiesMejorada($value)
 */
	class ProductionSystem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Province
 *
 * @property int $id
 * @property string $region_id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\District[] $districts
 * @property-read int|null $districts_count
 * @property-read \App\Models\Region $region
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereUpdatedAt($value)
 */
	class Province extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @property string $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Province[] $provinces
 * @property-read int|null $provinces_count
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sprout
 *
 * @property int $id
 * @property string $variety_id
 * @property string|null $color_predominant_tuber_shoot
 * @property string|null $color_secondary_tuber_shoot
 * @property string|null $distribution_color_secodary_tuber_shoot
 * @property string|null $photo_tuber_shoot
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Variety $variety
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout whereColorPredominantTuberShoot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout whereColorSecondaryTuberShoot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout whereDistributionColorSecodaryTuberShoot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout wherePhotoTuberShoot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sprout whereVarietyId($value)
 */
	class Sprout extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Submission
 *
 * @property int $id
 * @property string $uuid
 * @property int $xlsform_id
 * @property mixed $content
 * @property string $date_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Xlsform $xls_form
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereDateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereXlsformId($value)
 */
	class Submission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TubersAtHarvest
 *
 * @property int $id
 * @property string $variety_id
 * @property string|null $color_predominant_tuber
 * @property string|null $intensity_color_predominant_tuber
 * @property string|null $color_secondary_tuber
 * @property string|null $distribution_color_secodary_tuber
 * @property string|null $shape_tuber
 * @property string|null $variant_shape_tuber
 * @property string|null $depth_tuber_eyes
 * @property string|null $color_predominant_tuber_pulp
 * @property string|null $color_secondary_tuber_pulp
 * @property string|null $distribution_color_secodary_tuber_pulp
 * @property string|null $level_tolerance_late_blight
 * @property string|null $level_tolerance_weevil
 * @property string|null $level_tolerance_hailstorms
 * @property string|null $level_tolerance_frost
 * @property string|null $level_tolerance_drought
 * @property string|null $photo_tuber
 * @property int $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Variety $variety
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest query()
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereColorPredominantTuber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereColorPredominantTuberPulp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereColorSecondaryTuber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereColorSecondaryTuberPulp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereDepthTuberEyes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereDistributionColorSecodaryTuber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereDistributionColorSecodaryTuberPulp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereIntensityColorPredominantTuber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereLevelToleranceDrought($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereLevelToleranceFrost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereLevelToleranceHailstorms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereLevelToleranceLateBlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereLevelToleranceWeevil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest wherePhotoTuber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereShapeTuber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereVariantShapeTuber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TubersAtHarvest whereVarietyId($value)
 */
	class TubersAtHarvest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Variable
 *
 * @property int $id
 * @property string $data_map_id
 * @property string $xlsform_varname name of variable in XLSform
 * @property string $db_varname name of field in database
 * @property int $in_db Does the variables exist in the database?
 * @property string $type variable type
 * @property string $model The Laravel model to use
 * @property int $json Is the variable stored as json in the database?
 * @property string|null $linked_other the variable name that contains the "other" answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DataMap $data_map
 * @method static \Illuminate\Database\Eloquent\Builder|Variable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereDataMapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereDbVarname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereInDb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereLinkedOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variable whereXlsformVarname($value)
 */
	class Variable extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Variety
 *
 * @property string $id
 * @property string|null $name
 * @property string $farmer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TubersAtHarvest[] $TubersAtHarvests
 * @property-read int|null $tubers_at_harvests_count
 * @property-read \App\Models\Farmer $farmer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Flowering[] $flowerings
 * @property-read int|null $flowerings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Fructification[] $fructifications
 * @property-read int|null $fructifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sprout[] $sprouts
 * @property-read int|null $sprouts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Variety newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variety newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variety query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variety whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variety whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variety whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variety whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variety whereUpdatedAt($value)
 */
	class Variety extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Xlsform
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $xlsfile
 * @property string|null $kobo_id
 * @property string|null $kobo_version_id
 * @property int $is_active If true, form is active and deployed on Kobotools
 * @property string|null $enketo_url
 * @property string|null $link_page
 * @property string|null $description
 * @property array|null $media
 * @property mixed|null $content
 * @property int $live If true, this form is available to projects to use
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Submission[] $submissions
 * @property-read int|null $submissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform query()
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereEnketoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereKoboId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereKoboVersionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereLinkPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereLive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Xlsform whereXlsfile($value)
 */
	class Xlsform extends \Eloquent {}
}

