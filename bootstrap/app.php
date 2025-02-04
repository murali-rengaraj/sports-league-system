<?php

use App\Http\Middleware\CheckDays;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// use Illuminate\Support\Facades\Schedule;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->use([
        //     App\Http\Middleware\CheckDays::class,
        // ]);
        $middleware->alias([
            'checkdays'=> CheckDays::class
        ]);
        $middleware->validateCsrfTokens([
            '/form_without_csrf'
        ]);
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->call(function(){
            echo "Hello world! <br>";
        })->everySecond();
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->command('hello:world')->everyTenSeconds();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
