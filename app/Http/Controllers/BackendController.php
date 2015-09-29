<?php

namespace App\Http\Controllers;

use App\CIVTotal;
use App\Article;

class BackendController extends Controller
{
    public function render()
    {
        $blogPosts = Article::orderBy('created_at', 'desc')->get();

        foreach ($blogPosts as $post) {
            $post->human_time = $post->created_at->diffForHumans();
        }

        $civPerformance = CIVTotal::orderBy('id', 'desc')->take(30)->get();

        return view('backend.dashboard', ['blog_posts' => $blogPosts, 'civ_performance' => $civPerformance]);
    }
}
