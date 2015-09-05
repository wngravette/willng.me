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

            $companies = Investment::all();
            $lastPrices = [];

            foreach ($companies as $company)
            {
                $ticker = $company->ticker;
                $handle = @fopen("http://download.finance.yahoo.com/d/quotes.csv?s=$ticker.AX&f=l1", "r");
                if ($handle !== FALSE)
                {
                    $lastPrice = fgetcsv($handle);
                    fclose($handle);
                }
                $last_price = $lastPrice[0];

                $civ = new CIV;

                $civ->record_hash = uniqid(true);
                $civ->ticker = $ticker;
                $civ->last_price = $last_price;

                $civ->save();
            }

        })->weekdays()->at('16:45');

        $schedule->call(function () {

            $tickers = Investment::all();
            $values = [];

            foreach ($tickers as $company)
            {
                $ticker = $company->ticker;
                $amountOwned = $company->number_owned;
                $civEntry = CIV::where('ticker', $ticker)->orderBy('id', 'desc')->first();
                $value = $amountOwned * $civEntry->last_price;
                array_push($values, $value);
            }

            $civTotal = array_sum($values);

            $civEntry = new CIVTotal;

            $civEntry->record_hash = uniqid(true);
            $civEntry->amount = $civTotal;

            $civEntry->save();

        })->weekdays()->at('18:53');
    }
}
