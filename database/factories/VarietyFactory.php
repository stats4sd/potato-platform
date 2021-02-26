<?php

namespace Database\Factories;

use App\Models\Farmer;
use App\Models\Variety;
use Illuminate\Database\Eloquent\Factories\Factory;

class VarietyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Variety::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->word,
            'farmer_id' => Farmer::factory(),
        ];
    }
}
