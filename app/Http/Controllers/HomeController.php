<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function render()
    {
        $name_catches = ['Melbournian', 'Lord of Dance', 'Septuple Threat', 'Swimwear Model'];
        $name_catch = $name_catches[rand(0, count($name_catches) - 1)];

        return view('home', ['name_catch' => $name_catch]);
    }
}
