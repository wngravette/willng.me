<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CIV;
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

    public function id()
    {
        return uniqid(true);
    }
}
