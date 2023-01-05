<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use DB;

use Illuminate\Support\Facades\Mail;

class testCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testCron:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Every five minutes delete user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::orderBy('created_at', 'desc')->latest()->get();
        foreach($user as $all)
        {  
            User::where('created_at', '<=',now())->update(['is_active' => "0"]);
        }
        $this->info('Name has been chnaged Successfully');
        $this->info('Cron Job Started');
    }
}
