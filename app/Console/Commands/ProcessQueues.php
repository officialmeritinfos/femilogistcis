<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProcessQueues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process all queued jobs, retry failed jobs, and clean up old failed jobs.';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Processing queued jobs...');

        // Process the queue
        $this->call('queue:work', [
            '--stop-when-empty' => true, // Stops after processing all jobs
        ]);

        $this->info('Retrying failed jobs...');

        // Retry all failed jobs
        $this->call('queue:retry', ['all']);

        $this->info('Cleaning up failed jobs...');

        $this->info('Queue processing complete.');
    }
}
