<?php

namespace Database\Factories;

use App\Models\Sprout;
use App\Models\Submission;
use App\Models\Variety;
use Illuminate\Database\Eloquent\Factories\Factory;

class SproutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sprout::class;

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
            'color_predominant_tuber_shoot' => $this->faker->sentence(2),
            'color_secondary_tuber_shoot' => $this->faker->sentence(2),
            'distribution_color_secodary_tuber_shoot' => $this->faker->sentence(2),
            'photo_tuber_shoot' => $this->faker->sentence(2),

        ];
    }
}
