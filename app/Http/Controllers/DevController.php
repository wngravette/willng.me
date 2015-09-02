<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CIV;
use App\Investment;
use App\CIVTotal;
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
            $last_price = $lastPrice[0];

            $civ = new CIV;

            $civ->record_hash = uniqid(true);
            $civ->ticker = $company;
            $civ->last_price = $last_price;

            $civ->save();
        }
    }

    public function getValue()
    {
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
    }

    public function retroVal()
    {
        $values = [1325,1276,1310,1325,1299,1345,1359,1333,1397,1382,1359,1393,1416,1431,1347,1298,1353,1411,1347,1431,1382,1409,1298,1261,1294,1306,1261,1333,1149,1137];

        foreach ($values as $value)
        {
            $civEntry = new CIVTotal;

            $civEntry->record_hash = uniqid(true);
            $civEntry->amount = $value;

            $civEntry->save();
        }

    }

    public function id()
    {
        return uniqid(true);
    }
}
