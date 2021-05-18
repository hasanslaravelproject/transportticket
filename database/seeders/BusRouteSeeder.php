<?php

namespace Database\Seeders;

use App\Models\BusRoute;
use Illuminate\Database\Seeder;

class BusRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusRoute::factory()
            ->count(5)
            ->create();
    }
}
