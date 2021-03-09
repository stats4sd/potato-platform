<?php

namespace Database\Seeders;

use App\Models\Farmer;
use App\Models\Region;
use App\Models\Xlsform;
use App\Models\District;
use App\Models\Province;
use App\Models\Community;
use App\Models\Flowering;
use App\Models\Fructification;
use App\Models\Sprout;
use App\Models\TubersAtHarvest;
use App\Models\Variety;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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
                                Variety::factory()->count(2)
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
    }
}
