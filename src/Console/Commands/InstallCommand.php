<?php

namespace CodedByFJ\Nexora\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nexora:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install and setup the Nexora package';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Nexora installation...');

        $this->info('1. Running migrations...');
        Artisan::call('migrate');
        $this->comment('Migrations completed.');

        $this->info('2. Publishing assets...');
        Artisan::call('vendor:publish', [
            '--tag'   => 'nexora-assets',
            '--force' => true
        ]);
        $this->comment('Assets published.');

        $this->info('3. Publishing config...');
        Artisan::call('vendor:publish', [
            '--tag' => 'nexora-config'
        ]);
        $this->comment('Config published.');

        $this->success('Nexora installed successfully. Happy building!');
    }

    protected function success($message)
    {
        $this->output->writeln("<bg=green;fg=black;options=bold> SUCCESS </> $message");
    }
}
