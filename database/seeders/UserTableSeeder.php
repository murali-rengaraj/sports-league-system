<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                // 'name' => Str::random(10),
                // 'email' => Str::random(10).'@example.com',
                // 'password' => Str::random(8),
                // 'role' => 'user',
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ]);
        }
    }
}
