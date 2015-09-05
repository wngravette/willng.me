<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artisan;
use App\Article;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function down()
    {
        Artisan::call('down');
    }

    public function latestBlog()
    {
        $article = Article::orderBy('id', 'desc')->take(1)->get();
        return $article;
    }
}
