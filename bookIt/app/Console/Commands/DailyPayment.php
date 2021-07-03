<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DailyPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for users payment availability.';

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
        DB::table('task_histories')->insert([
            'task_id' => 83,
            'old_status' => 'in progress',
            'new_status' => 'done',
            'created_at' => now(),
        ]);
        $this->info('Successfully daily check for users payment. ');
    }
}
