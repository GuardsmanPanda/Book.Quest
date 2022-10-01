<?php

namespace Infrastructure\Console\Kernel;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Support\Facades\Artisan;

class ConsoleKernel extends Kernel {
    /**
     * The Artisan commands provided by your application.
     *
     * @var array<class-string>
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void {
        Artisan::command('zz:test', function () {

        });
    }
}
