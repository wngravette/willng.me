@extends('wrap')
@section('content')
<div class="pure-g header">
    <div class="pure-u-1">
        <div class="l-box">
            <h1>William Naughton-Gravette <span class="title_suppliment">Shit Blog</h1>
        </div>
    </div>
</div>
<div class="pure-g">
    <div class="pure-u-1 pure-u-lg-16-24 blog">
        <div class="l-box">
            <h1>{{$article->article_headline}}</h1>
            {!! $article->article_body !!}
        </div>
    </div>
    <div class="pure-u-1 pure-u-lg-8-24">
        <div class="l-box">
            <p>This is my blog, it provides little to no knowledge or wisdom towards humanity's collective information.</p>
            <p>Please enjoy. Or complain at william@willng.me.</p>
        </div>
    </div>
</div>
@endsection
