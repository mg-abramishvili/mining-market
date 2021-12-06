<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div id="app">
            <header>header</header>
            @yield('content')
        </div>
        
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>