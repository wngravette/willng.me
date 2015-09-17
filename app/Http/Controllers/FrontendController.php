<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CIV;
use App\CIVTotal;
use App\Article;

class FrontendController extends Controller
{
    public function render()
    {
        //Deeply hilarious catches
        $name_catches = ['Melbournian', 'Lord of Dance', 'Septuple Threat', 'Swimwear Model', '60% Cheese', 'Purveyor of Cheap Wine', 'Mummy Blogger', 'Recommended by 4 out of 5 Dentists', 'Vapid Moron, Frankly', 'Still Alive', 'Gold-digger', 'Your Dad', 'Coolest Mother-in-law Ever', 'Refined Lady', 'The Original People\'s Princess', 'Grier Family Social Media Spin-doctor'];

        $name_catch = $name_catches[rand(0, count($name_catches) - 1)];

        //Blog posts
        $blogPosts = Article::orderBy('created_at', 'desc')->take(5)->get();

        foreach ($blogPosts as $post)
        {
            $post->human_time = $post->created_at->diffForHumans();
        }

        //Logic for CIV chart
        $priceData = CIVTotal::orderBy('id', 'desc')->take(30)->get();


        return view('home', ['name_catch' => $name_catch, 'name_catches' => $name_catches, 'price_data' => $priceData, 'blog_posts' => $blogPosts]);

    }

    public function about()
    {
        //Deeply hilarious catches -- yes, as above. tedious but perhaps I'll move to DB l8r h8r
        $name_catches = ['Melbournian', 'Lord of Dance', 'Septuple Threat', 'Swimwear Model', '60% Cheese', 'Purveyor of Cheap Wine', 'Mummy Blogger', 'Recommended by 4 out of 5 Dentists', 'Vapid Moron, Frankly', 'Still Alive', 'Gold-digger', 'Your Dad', 'Coolest Mother-in-law Ever', 'Refined Lady', 'The Original People\'s Princess', 'Grier Family Social Media Spin-doctor'];

        return view('about', ['name_catches' => $name_catches]);
    }

    public function investments()
    {
        return view('civ', ['name_catch' => 'Investments']);
    }
}
