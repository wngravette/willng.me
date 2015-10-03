@extends('email.wrap')
@section('content')
<p>I made a new blog post,</p>
<h2><a href="https://willng.me/{{$article->article_url}}">{{$article->article_headline}}</a></h2>
<h3>{{$article->article_catch}}</h3>
<br/>
<p>Peace and blessings,</p>
<p>William Naughton-Gravette.</p>
@endsection
