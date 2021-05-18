<?php

namespace Database\Seeders;

use App\Models\BusCategory;
use Illuminate\Database\Seeder;

class BusCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusCategory::factory()
            ->count(5)
            ->create();
    }
}
