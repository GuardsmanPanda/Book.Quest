<?php

namespace Infrastructure\Integrity\Command;

use Illuminate\Console\Command;

class PhpStan extends Command {
    protected $signature = 'stan';
    protected $description = 'Run PHPStan on the application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(): mixed {
        $this->info("Running PHPStan on the application");
        exec(PHP_BINARY . ' ' . base_path('vendor/bin/') . "phpstan analyse Domain Service Web Integration Infrastructure --level 6 --ansi", $res, $code);
        // print the output
        foreach ($res as $line) {
            $this->info($line);
        }
        return $code;
    }
}
