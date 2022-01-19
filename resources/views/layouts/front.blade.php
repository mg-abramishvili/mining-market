<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <link href="{{ mix('css/front.css') }}" type="text/css" rel="stylesheet"/>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#603cba">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
        <div id="app">
            <header @if(Route::is('home')) class="header-index" @endif>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col header-logo">
                            <a href="/">
                                <img src="{{ $settings->logo }}" alt="Mining Market"/>
                            </a>
                        </div>
                        <div class="d-none d-xl-flex col header-nav">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="/">Главная</a>
                                    </li>
                                    <li>
                                        <a href="/#catalog">Фермы</a>
                                    </li>
                                    <li>
                                        <a href="/#reviews">Отзывы</a>
                                    </li>
                                    <li>
                                        <a href="/#steps">Этапы работы</a>
                                    </li>
                                    <li class="social">
                                        <a href="{{ $settings->youtube }}" target="_blank">
                                            <img src="/img/youtube.svg" />
                                        </a>
                                        <a href="{{ $settings->vk }}" target="_blank">
                                            <img src="/img/vk.svg" />
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="d-none d-xl-flex col header-tel">
                            <div class="header-tel-inner">
                                <a href="tel:+7{!! substr(str_replace(array(' ', '-', '+'), '', $settings->tel), 1) !!}">{{ $settings->tel }}</a>
                                <a onclick="open_modal_1()" style="cursor:pointer;"><span>Перезвоните мне</span></a>
                            </div>
                        </div>
                        <div class="d-xl-none col header-mobile">
                            <div class="header-mobile-wrapper">
                                <div class="header-mobile-tel">
                                    <a href="tel:+7{!! substr(str_replace(array(' ', '-', '+'), '', $settings->tel), 1) !!}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="header-mobile-nav">
                                    <button onclick="openMobileMenu()" class="navbar-toggler" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @yield('content')

            <div id="mobile-menu" class="mobile-menu" style="display:none">
                <button onclick="closeMobileMenu()" class="mobile-menu-close">&times;</button>
                <nav>
                    <ul>
                        <li>
                            <a href="/" class="mobile-menu-link">Главная</a>
                        </li>
                        <li>
                            <a href="/#catalog" class="mobile-menu-link">Фермы</a>
                        </li>
                        <li>
                            <a href="/#reviews" class="mobile-menu-link">Отзывы</a>
                        </li>
                        <li>
                            <a href="/#steps" class="mobile-menu-link">Этапы работы</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <footer>
                <div class="footer-top">
                  <div class="container">
                    <div class="row align-items-center">
                        <div class="col footer-logo">
                            <a href="/">
                                <img src="{{ $settings->logo }}" alt="Mining Market"/>
                            </a>
                        </div>
                        <div class="col footer-nav">
                            <ul>
                                <li>
                                    <a href="/">Главная</a>
                                </li>
                                <li>
                                    <a href="/#catalog">Фермы</a>
                                </li>
                                <li>
                                    <a href="/#reviews">Отзывы</a>
                                </li>
                                <li>
                                    <a href="/#steps">Этапы работы</a>
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
                            <ul>
                                <li>2022 &copy; Mining Market</li>
                                <li><a href="/policy" style="text-decoration: none; color: #fff;">Политика конфиденциальности</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-4 footer-tel-address">
                            <a href="tel:+7{!! substr(str_replace(array(' ', '-', '+'), '', $settings->tel), 1) !!}">{{ $settings->tel }}</a>
                            <span>{{ $settings->address }}</span>
                        </div>
                    </div>
                  </div>
                </div>
            </footer>

            <modal></modal>
        </div>
        <div class="modal-backdrop show"></div>

        <script src="{{ mix('js/front.js') }}" type="text/javascript"></script>
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        @yield('scripts')
        
        <script>
            function openMobileMenu() {
                document.getElementById("mobile-menu").style.display = 'block';
            }

            function closeMobileMenu() {
                document.getElementById("mobile-menu").style.display = 'none';
            }
        </script>
        <script>
            var mobile_menu_links = document.getElementsByClassName('mobile-menu-link');
            for(var i = 0, len = mobile_menu_links.length; i < len; i++) {
                mobile_menu_links[i].onclick = function () {
                    document.getElementById('mobile-menu').style.display = 'none'
                }
            }
        </script>

        <script>
            var swiper_home = new Swiper('.home-products-slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                direction: 'horizontal',
                breakpoints: {
                    576: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    992: {
                        slidesPerView: 3,
                    },
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });

            var swiper_reviews = new Swiper('.home-reviews-slider', {
                slidesPerView: 1,
                spaceBetween: 0,
                direction: 'horizontal',
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>

        <script>
            function open_modal_1() {
                document.getElementsByClassName("modal-backdrop")[0].classList.add('backdrop-show')
                document.getElementById("modal_1").classList.add("modal-show");
            }
        </script>
        <script>
            var modal = document.getElementById('modal_1');
            window.onclick = function(event) {
                if (event.target == modal) {
                    // Array.from(modal.getElementsByClassName('form-control')).forEach(input => {
                    //     input.value = ''
                    // })
                    modal.classList.remove("modal-show");
                    document.getElementsByClassName("modal-backdrop")[0].classList.remove('backdrop-show')
                }
            }
        </script>
    </body>
</html>