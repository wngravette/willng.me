<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/backend.css')}}"/>
    </head>
    <body>
        <div class="container">
            <div class="columns">
                <div class="one-half column centered">
                    @yield('auth_form')
                </div>
            </div>
        </div>
    </body>
</html>
