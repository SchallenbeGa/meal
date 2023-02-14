<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //here we tell the server to renew users generations every month (for dev : every 5 min )
        $schedule->command('renewtokens:cron')->monthly();
        //here we tell the server to add a new article based on chatgpt every weeks
        $schedule->command('generatearticle:cron')->weekly();
        // Schedule the tweet generation every 1 min
        $schedule->command('generatetweet:cron')->daily()->between('08:00', '10:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
