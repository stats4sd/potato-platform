<?php

namespace Database\Factories;

use App\Models\Choice;
use App\Models\Variety;
use App\Models\Submission;
use App\Models\TubersAtHarvest;
use Illuminate\Database\Eloquent\Factories\Factory;

class TubersAtHarvestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TubersAtHarvest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'variety_id' => Variety::factory(),
            'submission_id' => Submission::factory(),
            'color_predominant_tuber' => $this->getChoiceValue('color_predominant_tuber'),
            'intensity_color_predominant_tuber' => $this->getChoiceValue('intensity_color_predominant_tuber'),
            'color_secondary_tuber' => $this->getChoiceValue('color_secodary_tuber'),
            'distribution_color_secodary_tuber' => $this->getChoiceValue('distribution_color_secodary_tuber'),
            'shape_tuber' => $this->getChoiceValue('shape_tuber'),
            'variant_shape_tuber' => $this->getChoiceValue('variant_shape_tuber'),
            'depth_tuber_eyes' => $this->getChoiceValue('depth_tuber_eyes'),
            'color_predominant_tuber_pulp' => $this->getChoiceValue('color_predominant_tuber_pulp'),
            'color_secondary_tuber_pulp' => $this->getChoiceValue('color_secondary_tuber_pulp'),
            'distribution_color_secodary_tuber_pulp' => $this->getChoiceValue('distribution_color_secodary_tuber_pulp'),
            'level_tolerance_late_blight' => $this->getChoiceValue('level_tolerance_late_blight'),
            'level_tolerance_weevil' => $this->getChoiceValue('level_tolerance_weevil'),
            'level_tolerance_hailstorms' => $this->getChoiceValue('level_tolerance_hailstorms'),
            'level_tolerance_frost' => $this->getChoiceValue('level_tolerance_frost'),
            'level_tolerance_drought' => $this->getChoiceValue('level_tolerance_drought'),
            'photo_tuber' => null,
        ];
    }

    public function getChoiceValue($listName)
    {
        return Choice::where('list_name', $listName)->get()->random()->value;
    }
}
