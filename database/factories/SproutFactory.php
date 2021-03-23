<?php

namespace Database\Factories;

use App\Models\Choice;
use App\Models\Sprout;
use App\Models\Variety;
use App\Models\Submission;
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
            'color_predominant_tuber_shoot' => $this->getChoiceValue('color_predominant_tuber_shoot'),
            'color_secondary_tuber_shoot' => $this->getChoiceValue('color_secondary_tuber_shoot'),
            'distribution_color_secodary_tuber_shoot' => $this->getChoiceValue('distribution_color_secodary_tuber_shoot'),
            'photo_tuber_shoot' => null,
        ];
    }

    public function getChoiceValue($listName)
    {
        return Choice::where('list_name', $listName)->get()->random()->value;
    }
}
