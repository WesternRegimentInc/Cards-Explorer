<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('Title', 'CardsExplore')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/favicon-56x56.png') }}">


    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    @yield('css')

    <!-- Fix Internet Explorer ______________________________________-->

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="{{ asset('vendor/html5shiv.js') }}"></script>
    <script src="{{ asset('vendor/respond.js') }}"></script>
    <![endif]-->

</head>

<body class="finance-theme">
<div class="main-page-wrapper">

    <!-- ===================================================
        Loading Transition
    ==================================================== -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>


    <!--
    =============================================
        Theme Header
    ==============================================
    -->
    <header class="finance-header style-two">
        <!-- ============================ Theme Menu ========================= -->
        <div class="theme-main-menu">
            <div class="container">
                <div class="main-container clearfix">
                    <div class="logo float-left"><a href="{{ route('homepage') }}"><img src="{{ asset('images/logo/logo.png') }}" alt="Logo"></a></div>
                    <!-- ============== Menu Warpper ================ -->
                    <div class="menu-wrapper float-right">
                        <nav id="mega-menu-holder">
                            <ul class="clearfix">
                            <!--<li class="active"><a href="{{ route('homepage') }}">Home</a></li>-->
                                <li>
                                    <a href="#">Categories</a>
                                    <ul class="dropdown">
                                        @if(isset($menu_category))
                                            @foreach($menu_category as $menu)
                                                <li><a href="#">{{ $menu->name }}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                                <li><a href="#">Card Company</a></li>
                            </ul>
                        </nav> <!-- /#mega-menu-holder -->
                    </div> <!-- /.menu-wrapper -->
                </div> <!-- /.main-container -->
            </div> <!-- /.container -->
        </div> <!-- /.theme-main-menu -->
    </header> <!-- /.finance-header -->

    @yield('content')


    <!--
    =============================================
        Footer
    ==============================================
    -->
    <footer class="default-footer finance-footer">
        <div class="container">
            <div class="top-footer row">
                <div class="col-md-3 col-sm-3 col-xs-12 footer-list">
                    <h6>Information</h6>
                    <ul>
                        <li><a href="index.html" class="tran3s">Home</a></li>
                        <li><a href="#" class="tran3s">Customer</a></li>
                        <li><a href="services-v2.html" class="tran3s">Service</a></li>
                        <li><a href="#" class="tran3s">Collection</a></li>
                        <li><a href="blog-grid.html" class="tran3s">Blog</a></li>
                    </ul>
                </div> <!-- /.footer-list -->
                <div class="col-md-5 col-sm-4 col-xs-12 footer-latest-news">
                    <h6>Latest News</h6>
                    <div class="single-news">
                        <h5><a href="blog-details.html" class="tran3s">How can be successfull in market place..</a></h5>
                        <span>13 Feb, 2016  /  Business</span>
                    </div> <!-- /.single-news -->
                    <div class="single-news">
                        <h5><a href="blog-details.html" class="tran3s">How can be successfull in market place..</a></h5>
                        <span>13 Feb, 2016  /  Business</span>
                    </div> <!-- /.single-news -->
                </div> <!-- /.footer-latest-news -->

                <div class="col-md-4 col-xs-12 footer-subscribe">
                    <h6>Subscribe Us</h6>
                    <p>This sounded a very good reason, and Alice was quite pleased to know it.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your e-mail">
                        <button class="tran3s f-s-bg-color"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </form>
                </div> <!-- /.footer-subscribe -->
            </div> <!-- /.top-footer -->
        </div> <!-- /.container -->

        <div class="bottom-footer">
            <div class="container">
                <p class="float-left">Copyright &copy; 2012-2017 Consulting Theme. All rights reserved <a href="https://themeforest.net/user/unifytheme" class="tran3s f-s-color" target="_blank">Unifytheme</a></p>
                <ul class="float-right">
                    <li><a href="#" class="tran3s round-border"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="tran3s round-border"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="tran3s round-border"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="tran3s round-border"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="tran3s round-border"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                </ul>
            </div> <!-- /.container -->
        </div> <!-- /.bottom-footer -->
    </footer>


    <!-- Scroll Top Button -->
    <button class="scroll-top tran3s hvr-shutter-out-horizontal">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </button>





    <!-- Js File_________________________________ -->
    <!-- j Query -->
    <script type="text/javascript" src="{{ asset('vendor/jquery.2.2.3.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Vendor js _________ -->
    <!-- revolution -->
    <script src="{{ asset('vendor/revolution/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.kenburn.min.js') }}"></script>
    <!-- menu  -->
    <script type="text/javascript" src="{{ asset('vendor/menu/src/js/jquery.slimmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap Select JS -->
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
    <!-- fancy box -->
    <script type="text/javascript" src="{{ asset('vendor/fancy-box/jquery.fancybox.pack.js') }}"></script>
    <!-- js count to -->
    <script type="text/javascript" src="{{ asset('vendor/jquery.appear.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery.countTo.js') }}"></script>
    <!-- MixitUp -->
    <script type="text/javascript" src="{{ asset('vendor/jquery.mixitup.min.js') }}"></script>

    <!-- WOW js -->
    <script type="text/javascript" src="{{ asset('vendor/WOW-master/dist/wow.min.js') }}"></script>
    <!-- owl.carousel -->
    <script type="text/javascript" src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjQLCCbRKFhsr8BY78g2PQ0_bTyrm_YXU" type="text/javascript"></script>
    <script src="{{ asset('vendor/sanzzy-map/dist/snazzy-info-window.min.js') }}"></script>

    @yield('js')
</div> <!-- /.main-page-wrapper -->
</body>
</html>