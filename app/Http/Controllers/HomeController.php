<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CIV;
use App\CIVTotal;
use App\Article;

class HomeController extends Controller
{
    public function render()
    {
        //Deeply hilarious catches
        $name_catches = ['Melbournian', 'Lord of Dance', 'Septuple Threat', 'Swimwear Model', '60% Cheese', 'Purveyor of Cheap Wine', 'Mummy Blogger', 'Recommended by 4 out of 5 Dentists', 'Vapid Moron, Frankly', 'Still Alive', 'Gold-digger'];

        $name_catch = $name_catches[rand(0, count($name_catches) - 1)];

        //Blog posts
        $blogPosts = Article::orderBy('created_at', 'desc')->take(5)->get();

        foreach ($blogPosts as $post)
        {
            $post->human_time = $post->created_at->diffForHumans();
        }

        //Logic for CIV chart
        $priceData = CIVTotal::orderBy('id', 'desc')->take(30)->get();

        return view('home', ['name_catch' => $name_catch, 'price_data' => $priceData, 'blog_posts' => $blogPosts]);

    }
}
