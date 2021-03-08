<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\Farmer;
use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class FarmerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Farmer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name;

        return [
            'id' => $name,
            'community_id' => Community::factory(),
            'farmhouse' => $this->faker->sentence(2),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'altitude' => $this->faker->numberBetween(0, 3000),
            'name' => $name,
            'DNI' => $this->faker->sentence(2),
            'birth_date' => $this->faker->date('Y-m-d', Carbon::now()->subYears(18)->timestamp),
            'gender' => $this->faker->word(),
            'education' => $this->faker->sentence(3),
            'read_write' => $this->faker->boolean(),
            'language' => $this->faker->sentence(4),
            'language_prefered' => $this->faker->word(),
            'marital_status' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'whatsapp' => $this->faker->boolean,
            'aguapan_year' => $this->faker->year('now'),
            // skipping some variables for speed + not sure what they are for yet.
            'submission_id' => Submission::factory(),
        ];
    }
}
