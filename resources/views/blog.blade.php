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
        <div class="pure-u-21-24 blog_body">
            <div class="l-box">

                <h1>{{$article->article_headline}}</h1>
                <p><i>{{$article->humantime}}</i></p>
                {!! $article->article_body !!}
            </div>
        </div>
    </div>
    <div class="pure-u-1 pure-u-lg-8-24">
        <div class="l-box">
            <p class="desktop_only">This is my blog, it provides little to no knowledge or information towards humanity's collective wisdom.</p>
            <p class="mobile_only">This has been my blog, I'm sure it provided little to no knowledge or information towards humanity's collective wisdom.</p>
            <p class="desktop_only">I hope you enjoy. Or, whine at me at william@willng.me</p>
            <p class="mobile_only">I hope you enjoyed. If not, whine at me at william@willng.me</p>
        </div>
    </div>
</div>
@endsection
