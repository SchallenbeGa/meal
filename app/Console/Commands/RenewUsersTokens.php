<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class RenewUsersTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'renewtokens:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //renew the free plan user (remove for prod)
        $users = User::where('plans_id',0)->get();
        if (!empty($users)) {
            foreach ($users as $user) {
                $user->tokens = 5;
                $user->save();
            }
           
        }
        //renew the monthly plan user
        $users = User::where('plans_id',1)->get();
        if (!empty($users)) {
            foreach ($users as $user) {
                $user->tokens = 5;
                $user->save();
            }
           
        }
        $users = User::where('plans_id',2)->get();
        if (!empty($users)) {
            foreach ($users as $user) {
                $user->tokens = 25;
                $user->save();
            }
           
        }
        $users = User::where('plans_id',3)->get();
        if (!empty($users)) {
            foreach ($users as $user) {
                $user->tokens = 100;
                $user->save();
            }
           
        }  
        return Command::SUCCESS;
    }
}
