<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use App\Article;
use App\Jobs\NotifySubscribersOfBlog;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.new-article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $article = new Article($input);
        $article->article_url = rtrim(preg_replace('/[^a-z0-9]+/i', '-', strtolower(strip_tags($input['article_headline']))), "-");
        $article->save();

        $this->dispatch(new NotifySubscribersOfBlog());

        return redirect('/dashboard')->with('status', 'Your blog post has been published.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article_url = $id;
        $article = Article::where('article_url', $article_url)->first();
        if (!$article) {abort(404);}
        $article->humantime = $article->created_at->diffForHumans();

        return view('blog', ['name_catch' => 'Shit Blog', 'article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::find($id)->toArray();
        return view('backend.edit-article', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->article_headline = $request->article_headline;
        $article->article_catch = $request->article_catch;
        $article->article_body = $request->article_body;
        $article->save();

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
