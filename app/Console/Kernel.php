<?php

namespace App\Console;

use Mail;
use App\User;
use App\CIV;
use App\Investment;
use App\CIVTotal;
use App\APISpeed;
use DB;

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
        //Fetch API speed
        $schedule->call(function () {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://willng.me/api/inv/civ");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $start = microtime();
            curl_exec($ch);
            $end = microtime();
            curl_close($ch);

            $timeTaken = $end - $start;
            $timeTaken = round($timeTaken * 1000);

            if ($timeTaken < 0)
            {
                $timeTaken = 80;
            }

            $apiSpeed = new APISpeed;
            $apiSpeed->speed_ms = $timeTaken;
            $apiSpeed->save();
        })->everyMinute();

        //Fetch latest price data for all investments
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

        //Calculate the CIV and publish it to the CIVTotals table, making the data public.

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

        })->weekdays()->at('17:00');

        // Delete roughly 17 hours of API speed data for every 24 hours collected.
        $schedule->call(function () {
            $apiRecords = APISpeed::orderBy('id', 'asc')->take(1000)->get();
            $apiRecords->delete();
        })->dailyAt('0:00');

    }
}
