<?php

namespace Database\Factories;

use App\Models\Choice;
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
            'color_berries' => $this->getChoiceValue('color_berries'),
            'shape_berry' => $this->getChoiceValue('shape_berry'),
            'maturity_variety' => $this->getChoiceValue('maturity_variety'),
            'photo_berry' => null,
        ];
    }

    public function getChoiceValue($listName)
    {
        return Choice::where('list_name', $listName)->get()->random()->value;
    }
}
