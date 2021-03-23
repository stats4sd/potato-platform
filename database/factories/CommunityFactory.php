<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Community::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'district_id' => District::factory(),
            'name' => $this->faker->word,
        ];
    }
}
