<?php

namespace App\Console;

use App\Jobs\CreateSchulcode;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //Nachfolgender Command führt den Job täglich aus.
        //funktionier leider aber erst ab Laravel 5.5, muss also bis zum Update draußen bleiben
        //$schedule->job(new CreateSchulcode)->daily();
    }
}
