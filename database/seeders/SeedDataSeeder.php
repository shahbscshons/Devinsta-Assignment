<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SeedDataSeeder extends Seeder
{
    public function run()
    {
        // Clear table (optional, ensure table is named correctly)
        DB::table('insta_adjustments')->truncate();

        // Insert fake data for the last 12 months
        for ($i = 0; $i < 12; $i++) {
            DB::table('insta_adjustments')->insert([
                'field_name' => rand(0, 1) ? 'seed_input' : 'seed_response', // Randomly choose between seed_input and seed_response
                'value' => rand(10, 100),  // Random value for seed_input or seed_response
                'date' => Carbon::now()->subMonths($i)->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
