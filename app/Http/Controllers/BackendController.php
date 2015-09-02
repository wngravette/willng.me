<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CIVTotal;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{

    public function render()
    {
        $civPerformance = CIVTotal::orderBy('id', 'desc')->take(30)->get();
        return view('backend.dashboard', ['civ_performance' => $civPerformance]);
    }
}
