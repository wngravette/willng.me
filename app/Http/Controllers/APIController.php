<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artisan;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function down()
    {
        Artisan::call('down');
    }
}
