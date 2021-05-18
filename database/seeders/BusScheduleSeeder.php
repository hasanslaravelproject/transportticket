<?php

namespace Database\Seeders;

use App\Models\BusSchedule;
use Illuminate\Database\Seeder;

class BusScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusSchedule::factory()
            ->count(5)
            ->create();
    }
}
