<?php

namespace Database\Factories;

use App\Models\Choice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Choice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $label = $this->faker->sentence(2);
        return [
            'list_name' => Str::of($this->faker->sentence(2))->snake(),
            'value' => Str::of($label)->snake(),
            'label_spanish' => $label,
        ];
    }
}
