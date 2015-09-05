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

        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{asset('js/highcharts.js')}}"/></script>
        <script src="{{asset('js/chart-themes/gray.js')}}"/></script>
        <script src="https://use.typekit.net/dtm4seu.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{asset('img/favicons')}}/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('img/favicons')}}/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('img/favicons')}}/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('img/favicons')}}/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{asset('img/favicons')}}/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{asset('img/favicons')}}/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{asset('img/favicons')}}/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{asset('img/favicons')}}/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="{{asset('img/favicons')}}/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="{{asset('img/favicons')}}/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="{{asset('img/favicons')}}/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{asset('img/favicons')}}/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="{{asset('img/favicons')}}/favicon-128.png" sizes="128x128" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="{{asset('img/favicons')}}/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="{{asset('img/favicons')}}/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="{{asset('img/favicons')}}/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="{{asset('img/favicons')}}/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="{{asset('img/favicons')}}/mstile-310x310.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="application-name" content="William Naughton-Gravette"/>
        <meta property=”og:title” content=”{{$article->William Naughton-Gravette”/>
        <meta name=”description” content=”The personal website of full-stack developer and sugar daddy, William Naughton-Gravette.”>
        @yield('additional_head')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
