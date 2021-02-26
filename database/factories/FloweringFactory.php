<?php

namespace Database\Factories;

use App\Models\Flowering;
use App\Models\Submission;
use App\Models\Variety;
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
            'plant_growth' => $this->faker->sentence(2),
            'leaf_dissection' => $this->faker->sentence(2),
            'number_lateral_leaflets' => $this->faker->sentence(2),
            'number_intermediate_leaflets' => $this->faker->sentence(2),
            'number_leaflets_on_petioles' => $this->faker->sentence(2),
            'color_stem' => $this->faker->sentence(2),
            'shape_stem_wings' => $this->faker->sentence(2),
            'degree_flowering_plant' => $this->faker->sentence(2),
            'shape_corolla' => $this->faker->sentence(2),
            'color_predominant_flower' => $this->faker->sentence(2),
            'intensity_color_predominant_flower' => $this->faker->sentence(2),
            'color_secondary_flower' => $this->faker->sentence(2),
            'distribution_color_secodary_flower' => $this->faker->sentence(2),
            'pigmentation_anthers' => $this->faker->sentence(2),
            'pigmentation_pistil' => $this->faker->sentence(2),
            'color_chalice' => $this->faker->sentence(2),
            'color_pedicel' => $this->faker->sentence(2),
            'photo_flower' => $this->faker->sentence(2),
            'photo_plant' => $this->faker->sentence(2),
            'level_tolerance_late_blight' => $this->faker->sentence(2),
            'level_tolerance_hailstorms' => $this->faker->sentence(2),
            'level_tolerance_frost' => $this->faker->sentence(2),
            'level_tolerance_drought' => $this->faker->sentence(2),
            'submission_id' => Submission::factory(),
        ];
    }
}
