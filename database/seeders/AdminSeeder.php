<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name'=> "Admin2",
        //     'email'=> "admin2@sportsleague.com",
        //     'password'=> Hash::make('admin'),
        //     'role'=>'admin'
        // ]);

        User::factory()->count(5)->create();
    }
}
