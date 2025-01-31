<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->everyTwoSeconds();

// Artisan::command('hello', function () {
//     echo "Hello from Artisan";
// })->purpose('Display an inspiring quote')->everyTwoSeconds();