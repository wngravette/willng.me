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
        <script src="https://use.typekit.net/dtm4seu.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        @yield('additional_head')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
