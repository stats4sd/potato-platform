<?php

namespace Database\Factories;

use App\Models\Variety;
use App\Models\Submission;
use App\Models\Fructification;
use Illuminate\Database\Eloquent\Factories\Factory;

class FructificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fructification::class;

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
            'color_berries' => $this->faker->sentence(2),
            'shape_berry' => $this->faker->sentence(2),
            'maturity_variety' => $this->faker->sentence(2),
            'photo_berry' => $this->faker->sentence(2),
        ];
    }
}
