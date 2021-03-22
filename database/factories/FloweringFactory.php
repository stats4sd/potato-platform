<?php

namespace Database\Factories;

use App\Models\Choice;
use App\Models\Variety;
use App\Models\Flowering;
use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FloweringFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flowering::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'variety_id' => Variety::factory(),
            'plant_growth' => $this->getChoiceValue('plant_growth'),
            'leaf_dissection' => $this->getChoiceValue('leaf_dissection'),
            'number_lateral_leaflets' => $this->getChoiceValue('number_lateral_leaflets'),
            'number_intermediate_leaflets' => $this->getChoiceValue('number_intermediate_leaflets'),
            'number_leaflets_on_petioles' => $this->getChoiceValue('number_leaflets_on_petioles'),
            'color_stem' => $this->getChoiceValue('color_stem'),
            'shape_stem_wings' => $this->getChoiceValue('shape_stem_wings'),
            'degree_flowering_plant' => $this->getChoiceValue('degree_flowering_plant'),
            'shape_corolla' => $this->getChoiceValue('shape_corolla'),
            'color_predominant_flower' => $this->getChoiceValue('color_predominant_flower'),
            'intensity_color_predominant_flower' => $this->getChoiceValue('intensity_color_predominant_flower'),
            'color_secondary_flower' => $this->getChoiceValue('color_secondary_flower'),
            'distribution_color_secodary_flower' => $this->getChoiceValue('distribution_color_secodary_flower'),
            'pigmentation_anthers' => $this->getChoiceValue('pigmentation_anthers'),
            'pigmentation_pistil' => $this->getChoiceValue('pigmentation_pistil'),
            'color_chalice' => $this->getChoiceValue('color_chalice'),
            'color_pedicel' => $this->getChoiceValue('color_pedicel'),
            'photo_flower' => null,
            'photo_plant' => null,
            'level_tolerance_late_blight' => $this->getChoiceValue('level_tolerance_late_blight'),
            'level_tolerance_hailstorms' => $this->getChoiceValue('level_tolerance_hailstorms'),
            'level_tolerance_frost' => $this->getChoiceValue('level_tolerance_frost'),
            'level_tolerance_drought' => $this->getChoiceValue('level_tolerance_drought'),
            'submission_id' => Submission::factory(),
        ];
    }

    public function getChoiceValue($listName)
    {
        return Choice::where('list_name', $listName)->get()->random()->value;
    }
}
