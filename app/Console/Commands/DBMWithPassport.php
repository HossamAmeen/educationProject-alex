<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan  , Log ;
class DBMWithPassport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:passport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        // Log::info('cron started on ' . date("Y-m-d"));
        // Artisan::command('php artisan migrate:fresh');
        Artisan::call('migrate:fresh --seed');
        Artisan::call('passport:install');
    }
}
