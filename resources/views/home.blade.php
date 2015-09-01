@extends('wrap')
@section('content')
<div class="pure-g header">
    <div class="pure-u-1">
        <div class="l-box">
            <h1>William Naughton-Gravette <span class="title_suppliment">{{$name_catch}}</h1>
            <h1 class="header_under">Full Stack Developer &#183; Partner at Naughton &amp; Ross </h1>
        </div>
    </div>
</div>
<div class="pure-g">
    <div class="pure-u-16-24 blog">
        <div class="pure-u-1 blog-item">
            <div class="l-box">
                <p class="timeago">6 days ago</p>
                <h1>This is a blog post, and this is it's title</h1>
            </div>
        </div>
        <div class="pure-u-1 blog-item">
            <div class="l-box">
                <p class="timeago">18 days ago</p>
                <h1>This is an additional, older blog post, and this is&nbsp;it’s&nbsp;title</h1>
            </div>
        </div>
    </div>
    <div class="pure-u-8-24">
        <div class="l-box">
            <p>I have interests in a number of publically-listed Australian companies, and I like to keep track of them here for everyone’s perusal.</p>
        </div>
    </div>
</div>
@endsection
