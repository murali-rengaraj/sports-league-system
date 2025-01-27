<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('teams')->insert([
                'name' => 'Team ' . $i,
                'city' => Str::random(10),
                'logo_url' => 'https://via.placeholder.com/150',
                'founded_year' => rand(1950, 2020),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
