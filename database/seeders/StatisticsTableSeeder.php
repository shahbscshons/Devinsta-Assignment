<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statistics')->insert([
            'insta_visitor' => 150,
            'facebook_visitor' => 200,
            'site_session' => 300,
            'site_engagement' => 250,
            'device_iphone' => 100,
            'device_android' => 150,
            'device_pc' => 50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
