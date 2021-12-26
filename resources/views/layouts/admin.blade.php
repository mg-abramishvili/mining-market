<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        
        <link href="{{ mix('css/admin.css') }}" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div id="app">
            @auth
                <header>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Выйти</a>
                    </form>
                </header>
            @endauth

            @yield('content')
        </div>
        
        <script src="{{ mix('js/admin.js') }}" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>