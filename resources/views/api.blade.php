@extends('wrap')
@section('additional_head')
<link rel="stylesheet" href="{{asset('css/api.css')}}"/>
@endsection
@section('content')
<div class="pure-g header">
    <div class="pure-u-1">
        <div class="l-box">
            <h1>William Naughton-Gravette <span class="title_suppliment tooltipped tooltipped-s" aria-label="Application Program Interface, idiot.">API</h1>
        </div>
    </div>
</div>
<div class="pure-g">
    <div class="pure-u-20-24 pure-u-lg-16-24">
        <div class="l-box">
            <p>This is my pointless API, I hope you never use it because I have absolutely no means of monitoring it's use and abuse.</p>
            <p><span class="state state-blue">GET</span> <a href="blog/latest"><code>/blog/latest</code></a></p>
            <p>A full JSON representation of my latest blog post.</p>
            <p><span class="state state-blue">GET</span> <a href="inv/civ"><code>/inv/civ</code></a></p>
            <p>A JSON representation of up to 30 days of my portfolio’s performance on the ASX. The <code>amount</code> figure is abstracted using a common, random integer in order to obsfucate the actual value of my portfolio, but provide an accurate relative and fractional figure in place of the raw number.</p>
            <p><span class="state state-blue">GET</span> <a href="inv/civ/latest"><code>/inv/civ/latest</code></a></p>
            <p>A JSON representation of my CIV (Cumulative Investment Value) as of the end of the previous trading day.</p>
        </div>
    </div>
</div>
@endsection
