<?php

namespace Database\Seeders;

use App\Models\SeatClass;
use Illuminate\Database\Seeder;

class SeatClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeatClass::factory()
            ->count(5)
            ->create();
    }
}
