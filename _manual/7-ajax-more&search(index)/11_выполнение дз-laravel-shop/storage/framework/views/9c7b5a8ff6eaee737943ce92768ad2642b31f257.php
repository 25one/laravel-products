<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo e(asset('public/img/core-img/favicon.ico')); ?>">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/core-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/style.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="button" class="button_search"><img src="<?php echo e(asset('public/img/core-img/search.png')); ?>" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="#"><img src="<?php echo e(asset('public/img/core-img/logo.png')); ?>" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="#"><img src="<?php echo e(asset('public/img/core-img/logo.png')); ?>" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <!-- <li><a href="shop.html">Shop</a></li>
                    <li><a href="product-details.html">Product</a></li>-->

                    <?php if(\Request::is('/')): ?>  
                    <li><a href="#" class="search-nav">Search <img src="<?php echo e(asset('public/img/core-img/search.png')); ?>" alt=""></a></li>
                    <?php endif; ?>

                    <li><a href="<?php echo e(route('cart')); ?>">Cart</a></li>
                    <!-- <li><a href="checkout.html">Checkout</a></li> -->
                </ul>
            </nav>
            <!-- Button Group -->
            <!-- <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div> ->
            <!-- Cart Menu -->
            <!-- <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div> -->
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <?php echo $__env->yieldContent('main'); ?>

    </div>
    <!-- ##### Main Content Wrapper End ##### -->        

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img src="<?php echo e(asset('public/img/core-img/logo2.png')); ?>" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                                        </li>
                                        <!--<li class="nav-item">
                                            <a class="nav-link" href="shop.html">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="product-details.html">Product</a>
                                        </li> -->
                                        <?php if(\Request::is('/')): ?>  
                                        <li class="nav-item"><a href="#" class="search-nav nav-link">Search <img src="<?php echo e(asset('public/img/core-img/search.png')); ?>" alt=""></a></li>
                                        <?php endif; ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('cart')); ?>">Cart</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="checkout.html">Checkout</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="<?php echo e(asset('public/js/jquery/jquery-2.2.4.min.js')); ?>"></script>
    <!-- Popper js -->
    <script src="<?php echo e(asset('public/js/popper.min.js')); ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>
    <!-- Plugins js -->
    <script src="<?php echo e(asset('public/js/plugins.js')); ?>"></script>
    <!-- Active js -->
    <script src="<?php echo e(asset('public/js/active.js')); ?>"></script>
    <!-- My customer js -->
    <!-- <script src="<?php echo e(asset('public/js/main.js')); ?>"></script> -->   

    <?php echo $__env->yieldContent('js'); ?>

</body>

</html><?php /**PATH /home/alex/www/laravel-shop/resources/views/shop/layout.blade.php ENDPATH**/ ?>