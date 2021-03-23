<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Farmer;
use App\Models\Region;
use App\Models\Sprout;
use App\Models\Variety;
use App\Models\Xlsform;
use App\Models\District;
use App\Models\Province;
use App\Models\Community;
use App\Models\Flowering;
use App\Models\Fructification;
use App\Models\TubersAtHarvest;
use Illuminate\Database\Seeder;
use Database\Seeders\ChoicesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            ChoicesSeeder::class,
        );

        // create a single xlsform for the farmer submissions to be linked to...
        $xlsform = Xlsform::factory()->create();

        $regions = Region::factory()
            ->count(2)
            ->has(
                Province::factory()->count(1)
                ->has(
                    District::factory()->count(2)
                    ->has(
                        Community::factory()->count(2)
                        ->has(
                            Farmer::factory()->count(3)
                            ->has(
                                Variety::factory()->count(20)
                                ->has(Flowering::factory())
                                ->has(Fructification::factory())
                                ->has(TubersAtHarvest::factory())
                                ->has(Sprout::factory())
                            )
                        )
                    )
                )
            )
            ->create();

        if (config('app.env') === 'local') {
            User::factory(['email' => 'test@example.com'])->create();
        }
    }
}
