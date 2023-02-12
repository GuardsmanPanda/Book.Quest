<?php declare(strict_types=1);

namespace Infrastructure\Console\Kernel;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

final class ConsoleKernel extends Kernel {
    protected $commands = [
    ];

    protected function schedule(Schedule $schedule): void {
        // $schedule->command('inspire')->hourly();
    }

    protected function commands(): void {
        Artisan::command('zz', function () {
            DB::beginTransaction();
            DB::commit();
        });
    }
}
