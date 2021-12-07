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
            <header>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col header-logo">
                            <a href="/">
                                <img src="/img/logo.svg" alt="Mining Market"/>
                            </a>
                        </div>
                        <div class="col header-nav">
                            <ul>
                                <li>
                                    <a href="#">Рассчитать доход</a>
                                </li>
                                <li>
                                    <a href="#">Каталог</a>
                                </li>
                                <li>
                                    <a href="#">Отзывы</a>
                                </li>
                                <li>
                                    <a href="#">Контакты</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col header-tel">
                            <div class="header-tel-inner">
                                <a href="#">+7 999 123-45-67</a>
                                <span>Перезвоните мне</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @yield('content')

            <footer>
                <div class="footer-top">
                  <div class="container">
                    <div class="row align-items-center">
                        <div class="col footer-logo">
                            <a href="/">
                                <img src="/img/logo.svg" alt="Mining Market"/>
                            </a>
                        </div>
                        <div class="col footer-nav">
                            <ul>
                                <li>
                                    <a href="#">Рассчитать доход</a>
                                </li>
                                <li>
                                    <a href="#">Каталог</a>
                                </li>
                                <li>
                                    <a href="#">Отзывы</a>
                                </li>
                                <li>
                                    <a href="#">Контакты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="footer-bottom">
                  <div class="container">
                      <div class="row align-items-center">
                        <div class="col-12 col-lg-8">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure qui doloribus error? Tempore vel architecto nesciunt velit adipisci doloremque illum.</p>
                            <ul>
                                <li>2021 &copy; Mining Market</li>
                                <li>Политика конфиденциальности</li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-4 footer-tel-address">
                            <a href="#">+7 999 123-45-67</a>
                            <span>г. Уфа, ул. Уличная, 1/1, офис 1</span>
                        </div>
                    </div>
                  </div>
                </div>
            </footer>
        </div>
        
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        @yield('scripts')
    </body>
</html>