<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>William Naughton-Gravette</title>
        <link rel="stylesheet" href="{{ asset('css/backend.css')}}"/>
        <link rel="stylesheet" href="{{ asset('css/backend-custom.css')}}"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{asset('js/highcharts.js')}}"/></script>
        <script src="{{asset('js/ckeditor/ckeditor.js')}}"/></script>
    </head>
    <body>
        <div class="container">
            <div class="columns header">
                <div class="column single-column">
                    <h3>William Naughton-Gravette</h3>
                </div>
            </div>
            @yield('content')
        </div>
    </body>
</html>
