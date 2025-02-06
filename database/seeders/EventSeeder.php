<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => 'Summer Sports Fest',
                'description' => 'An exciting summer event with various sports competitions.',
                'date' => Carbon::now()->addDays(10),
                'location' => 'M. A. Chidambaram Stadium',
                'price' => 200.00,
                'capacity' => 500,
            ],
            [
                'name' => 'Basketball Championship',
                'description' => 'A thrilling basketball tournament for all levels.',
                'date' => Carbon::now()->addDays(15),
                'location' => 'Narendra Modi Stadium',
                'price' => 150.00,
                'capacity' => 300,
            ],
            [
                'name' => 'Football League Finals',
                'description' => 'The ultimate battle between top football teams.',
                'date' => Carbon::now()->addDays(20),
                'location' => 'Greenfield International Stadium',
                'price' => 2500.00,
                'capacity' => 1000,
            ],
            [
                'name' => 'Tennis Open Championship',
                'description' => 'A high-energy tennis competition for professionals and amateurs.',
                'date' => Carbon::now()->addDays(30),
                'location' => 'Wankhede Stadium',
                'price' => 3000.00,
                'capacity' => 200,
            ],
            [
                'name' => 'Marathon 2025',
                'description' => 'A city-wide marathon with different race categories.',
                'date' => Carbon::now()->addDays(40),
                'location' => 'City Park',
                'price' => 100.00,
                'capacity' => 2000,
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
