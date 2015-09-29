<?php

namespace App\Http\Controllers;

use Artisan;
use App\Article;
use App\CIVTotal;

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

    public function blog5()
    {
        $article = Article::orderBy('id', 'desc')->take(5)->get();

        return $article;
    }

    public function civ()
    {
        $civ = CIVTotal::orderBy('id', 'desc')->take(1)->get();
        $rand = mt_rand(50 * 10, 250 * 10) / 10;
        foreach ($civ as $civ_ind) {
            $civ_ind->amount = $civ_ind->amount / $rand;
        }

        return $civ;
    }

    public function civ30()
    {
        $civ = CIVTotal::orderBy('id', 'desc')->take(30)->get();
        $rand = mt_rand(50 * 10, 250 * 10) / 10;
        foreach ($civ as $civ_ind) {
            $civ_ind->amount = $civ_ind->amount / $rand;
        }

        return $civ;
    }
}
