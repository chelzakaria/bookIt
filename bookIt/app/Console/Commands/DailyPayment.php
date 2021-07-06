<?php

namespace App\Console\Commands;

use App\Models\Membership;
use App\Models\User;
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
        $memberships = Membership::all();
        foreach ($memberships as $membership) {
            
            if($membership->account_type === "premium" && $membership->end_date <= now())
            {
                $membership->account_type = "none";
                $membership->end_date = null;
                $membership->save();
            }
            if($membership->account_type === "free" && $membership->end_date && $membership->end_date<= now())
            {
                $membership->end_date = null;
                $membership->save();
            }
          
        }
        $this->info('Successfully daily check for users payment. ');
    }
}
