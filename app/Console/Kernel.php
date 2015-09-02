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
                array_push($lastPrices, $lastPrice[0]);
            }

            $tickers = implode(",", $companies);
            $last_prices = implode(",", $lastPrices);

            // DB::table('CIV')->insert(
            //     ['record_hash' => uniqid(true), 'tickers' => $tickers, 'last_prices' => $last_prices]
            // );

            $civ = new CIV;

            $civ->record_hash = uniqid(true);
            $civ->tickers = $tickers;
            $civ->last_prices = $last_prices;

            $civ->save();

        })->weekdays()->at('17:00');
    }
}
