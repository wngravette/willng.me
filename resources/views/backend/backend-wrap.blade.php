<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>William Naughton-Gravette</title>
        <link rel="stylesheet" href="{{ asset('css/backend.css')}}"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{asset('js/highcharts.js')}}"/></script>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
