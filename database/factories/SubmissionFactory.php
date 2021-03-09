<?php

namespace Database\Factories;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Submission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'xlsform_id' => 1, // will have a dummy form created through seeder
            'content' => json_encode(['fakedata' => $this->faker->words(2),]),
            'date_time' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
