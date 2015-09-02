<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CIV;

class HomeController extends Controller
{
    public function render()
    {
        //Deeply hilarious catches
        $name_catches = ['Melbournian', 'Lord of Dance', 'Septuple Threat', 'Swimwear Model', '60% Cheese', 'Purveyor of Cheap Wine', 'Mummy Blogger', 'Recommended by 4 out of 5 Dentists', 'Vapid Moron, Frankly', 'Still Alive', 'Gold-digger'];

        $name_catch = $name_catches[rand(0, count($name_catches) - 1)];

        //Logic for CIV chart
        $priceData = CIV::orderBy('id', 'desc')->take(30)->get();
        return $priceData;

        return view('home', ['name_catch' => $name_catch]);
    }
}
