<?php

namespace Database\Factories;

use App\Models\Submission;
use App\Models\TubersAtHarvest;
use App\Models\Variety;
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
            'color_predominant_tuber' => $this->faker->sentence(2),
            'intensity_color_predominant_tuber' => $this->faker->sentence(2),
            'color_secondary_tuber' => $this->faker->sentence(2),
            'distribution_color_secodary_tuber' => $this->faker->sentence(2),
            'shape_tuber' => $this->faker->sentence(2),
            'variant_shape_tuber' => $this->faker->sentence(2),
            'depth_tuber_eyes' => $this->faker->sentence(2),
            'color_predominant_tuber_pulp' => $this->faker->sentence(2),
            'color_secondary_tuber_pulp' => $this->faker->sentence(2),
            'distribution_color_secodary_tuber_pulp' => $this->faker->sentence(2),
            'level_tolerance_late_blight' => $this->faker->sentence(2),
            'level_tolerance_weevil' => $this->faker->sentence(2),
            'level_tolerance_hailstorms' => $this->faker->sentence(2),
            'level_tolerance_frost' => $this->faker->sentence(2),
            'level_tolerance_drought' => $this->faker->sentence(2),
            'photo_tuber' => $this->faker->sentence(2),
        ];
    }
}
