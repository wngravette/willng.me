<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>William Naughton-Gravette</title>
        <link rel="stylesheet" href="{{asset('css/pure.css')}}">
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="{{asset('css/grid-old-ie.css')}}">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="{{asset('css/grid.css')}}">
        <!--<![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{asset('js/highcharts.js')}}"/></script>
        <script src="{{asset('js/chart-themes/gray.js')}}"/></script>
        <script src="https://use.typekit.net/dtm4seu.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/favicons')}}/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/favicons')}}/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/favicons')}}/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicons')}}/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/favicons')}}/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/favicons')}}/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/favicons')}}/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/favicons')}}/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicons')}}/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('img/favicons')}}/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicons')}}/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicons')}}/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicons')}}/favicon-16x16.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{asset('img/favicons')}}/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        @yield('additional_head')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
