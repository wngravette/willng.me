@extends('email.wrap')
@section('content')
<p>I made a new blog post,</p>
<h2>{{$article->article_headline}}</h2>
<h3>{{$article->article_catch}}</h3>
<br/>
<p>Peace and blessings,</p>
<p>William Naughton-Gravette.</p>
@endsection
