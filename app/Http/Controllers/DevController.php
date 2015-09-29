<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\CIV;
use App\Investment;
use App\CIVTotal;
use App\Subscriber;
use App\APISpeed;

class DevController extends Controller
{
    public function asx()
    {
        $companies = Investment::all();
        $lastPrices = [];

        foreach ($companies as $company) {
            $ticker = $company->ticker;
            $handle = @fopen("http://download.finance.yahoo.com/d/quotes.csv?s=$ticker.AX&f=l1", 'r');
            if ($handle !== false) {
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
    }

    public function getValue()
    {
        $tickers = Investment::all();
        $values = [];

        foreach ($tickers as $company) {
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

        foreach ($values as $value) {
            $civEntry = new CIVTotal;

            $civEntry->record_hash = uniqid(true);
            $civEntry->amount = $value;

            $civEntry->save();
        }
    }

    public function send()
    {
        $user = User::findOrFail(1);

        Mail::send('email.test', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }

    public function sendToCachet()
    {
        $url = 'http://status.willng.me/api/v1/metrics/1/points';
        $data = ['value' => '10'];

        // use key 'http' even if you send the request to https://...
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n"."X-Cachet-Token: cSAm7TGjdvKmPpWcmoFv\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;
    }

    public function apitime()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://willng.me/api/inv/civ');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $start = microtime();
        curl_exec($ch);
        $end = microtime();

        curl_close($ch);

        $timeTaken = $end - $start;
        $timeTaken = round($timeTaken * 1000);

        if ($timeTaken < 0) {
            $timeTaken = 80;
        }

        return $timeTaken;
    }

    public function id()
    {
        return uniqid(true);
    }

    public function subs()
    {
        $subscribers = Subscriber::all();

        return $subscribers;
    }

    public function apidelete()
    {
        $apiRecords = APISpeed::orderBy('id', 'asc')->take(1000)->get();

        return $apiRecords;
    }
}
