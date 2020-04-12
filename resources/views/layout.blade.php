<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('images/twitterLogo.png') }}" type="image/png" sizes="16x16">

        <title>Twitter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('css/app.css') }}">
    </head>
    <body>
        <div id="app">
        @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://use.fontawesome.com/7ccc3ead1b.js"></script>
    </body>
</html>