<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use CIV;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DevController extends Controller
{
    public function asx()
    {

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

        DB::table('CIV')->insert(
            ['tickers' => $tickers, 'last_prices' => $last_prices]
        );

    }
}
