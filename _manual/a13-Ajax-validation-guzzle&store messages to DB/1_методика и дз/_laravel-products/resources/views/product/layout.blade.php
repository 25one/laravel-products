﻿<!DOCTYPE html>
<html lang="en">
<head>
<title>Little Closet</title>
<meta charset="utf-8">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
<link href="{{ asset('public/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/styles/responsive.css') }}">
<!--
<link rel="stylesheet" type="text/css" href="{{ asset('public/styles/cart.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/styles/cart_responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/styles/product.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/styles/product_responsive.css') }}">
-->

@yield('css')

</head>
<body>

<!-- Menu -->

<!-- Search, Navigation, Contact Info -->

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_overlay"></div>
        <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo">
                <a href="{{route('home')}}">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="{{ asset('public/images/logo_1.png') }}" alt=""></div>
                        <div>Little Closet</div>
                    </div>
                </a>    
            </div>

            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>

            <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">

                @if (\Request::is('/'))  
                <!-- Search -->
                <div class="header_search">
                    <form action="/" id="header_search_form" method="post">
                        <input type="text" name="search_input" class="search_input" placeholder="Поиск...">
                        <button name="hook" type="button" class="header_search_button" value="Search"><img src="{{ asset('public/images/search.png') }}" alt=""></button>
                    </form>
                </div>
               @endif

                <!-- Cart -->
                <div class="cart"><a href="{{ route('cart') }}"><div><img class="svg" src="{{ asset('public/images/cart.svg') }}" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
                <!-- Phone -->
                <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                    <div><div><img src="{{ asset('public/images/phone.svg') }}" alt="https://www.flaticon.com/authors/freepik"></div></div>
                    <div>+380731111111</div>
                </div>
            </div>

        </div>
    </header>

    @yield('main')

        <!-- Footer -->

        <footer class="footer">
            <div class="footer_content">
                <div class="container">
                    <div class="row">
                        
                        <!-- About -->
                        <div class="col-lg-4 footer_col">
                            <div class="footer_about">
                                <div class="footer_logo">
                                    <a href="{{route('home')}}">
                                        <div class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="footer_logo_icon"><img src="{{ asset('public/images/logo_2.png') }}" alt=""></div>
                                            <div>Little Closet</div>
                                        </div>
                                    </a>        
                                </div>
                                <div class="footer_about_text" style="text-align: justify;">
                                    <p>Little Closet - небольшой магазин стильный и универсальных вещей на каждый день. Мы позаботились о том, чтобы любой наш покупатель остался доволен нашими ценамами, качеством товаров и сервисом обслуживания.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Links -->
                        <div class="col-lg-4 footer_col">
                            <div class="footer_contact">
                                <div class="footer_title">Оставайтесь на связи</div>
                                <div class="newsletter">
                                    <form action="" method="" id="newsletter_form" class="newsletter_form">
                                        <input type="text" name="newsletter_input_message" class="newsletter_input message" placeholder="Ваше сообщение">
                                        <input type="text" name="newsletter_input_email" class="newsletter_input email" placeholder="Ваш контакт(email, skype,...)">
                                        <br>
                                        <button type="button" class="newsletter_button">></button><br>
                                        <span class="result_to_email">&nbsp;</span>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Contact -->
                        <div class="col-lg-4 footer_col">
                            <div class="footer_contact">
                                    <div class="footer_title">Social</div>
                                    <ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bar">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
                                <div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">WEB-STUDIO "25one"</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
        
</div>

<script src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('public/styles/bootstrap-4.1.2/popper.js') }}"></script>
<script src="{{ asset('public/styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('public/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('public/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('public/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('public/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('public/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('public/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('public/plugins/progressbar/progressbar.min.js') }}"></script>
<script src="{{ asset('public/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>

@yield('js')

</body>
</html>