<?php

namespace App\Console;

use CIV;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->call(function () {

            $companies = ['AWV', 'QBL', 'CM8'];
            $lastPrices = [];

            foreach ($companies as $company)
            {
                $handle = @fopen("http://download.finance.yahoo.com/d/quotes.csv?s=$company.AX&f=l1", "r");
                if ($handle !== FALSE)
                {
                    $lastPrice = fgetcsv($handle);
                    fclose($handle);
                }
                array_push($lastPrices, $lastPrice);
            }

            $civ = new CIV();

            $civ->tickers = implode(",", $companies);
            $civ->last_prices = implode(",", $lastPrices);

        })->dailyAt('17:00');
    }
}
