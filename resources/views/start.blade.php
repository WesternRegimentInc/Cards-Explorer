@extends('layout.start')
@section('title')
    Homepage
@endsection

@section('css')

@endsection

@section('content')
    <!--
        =============================================
            Theme Main Banner
        ==============================================
        -->
    <div id="banner">
        <div class="rev_slider_wrapper">
            <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
            <div id="finance-main-banner-two" class="rev_slider" data-version="5.0.7">
                <ul>
                    <!-- SLIDE1  -->
                    <li data-index="rs-280" data-transition="zoomout" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-rotate="0"  data-saveperformance="off"  data-title="01" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="images/home/slide-1.jpg"  alt="image"  class="rev-slidebg" data-bgparallax="3" data-bgposition="center center" data-duration="20000" data-ease="Linear.easeNone" data-kenburns="on" data-no-retina="" data-offsetend="0 0" data-offsetstart="0 0" data-rotateend="0" data-rotatestart="0" data-scaleend="100" data-scalestart="140">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption"
                             data-x="['left','left','left','center']" data-hoffset="['0','0','0','10']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['-100','-100','-100','-90']"
                             data-width="full"
                             data-height="none"
                             data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:0px;y:[100%];"
                             data-mask_out="x:inherit;y:inherit;"
                             data-start="500"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             style="z-index: 6; white-space: nowrap;">
                            <h1>Provide Best <br>Financial Service!!</h1>
                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption"
                             data-x="['left','left','left','center']" data-hoffset="['0','0','0','10']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['25','25','25','35']"
                             data-width="full"
                             data-height="none"
                             data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:0px;y:[100%];"
                             data-mask_out="x:inherit;y:inherit;"
                             data-start="1500"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             style="z-index: 6; white-space: nowrap;">
                            <h6>We have experience over 12 years in providing business solution with our top <br>rated experts &amp; advance care with love.</h6>
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption"
                             data-x="['left','left','left','left']" data-hoffset="['0','0','0','10']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['150','150','150','150']"
                             data-transform_idle="o:1;"
                             data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                             data-transform_in="x:[-100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                             data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;"
                             data-start="2500"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on">
                            <a href="about-us.html" class="read-button button-one f-p-bg-color">Read More </a>
                        </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption"
                             data-x="['left','left','left','left']" data-hoffset="['187','187','187','10']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['150','150','150','215']"
                             data-transform_idle="o:1;"
                             data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                             data-transform_in="x:[100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2500;e:Power3.easeInOut;"
                             data-transform_out="auto:auto;s:1000;e:Power2.easeInOut;"
                             data-start="2500"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on">
                            <a href="services-v1.html" class="service-button button-one f-s-bg-color">See Services</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- END REVOLUTION SLIDER -->
    </div> <!--  /#banner -->

    <!--
    =============================================
        Finance Offer
    ==============================================
    -->
    <section class="finance-offer">
        <div class="container">
            <div class="title">
                <h4>Top Credit Card Categories</h4>
                <h5 style="line-height: 40px;">Explore our partner credit card deals for one that perfectly fits your needs</h5>
            </div> <!-- /.title -->

            <div class="row">
                <div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-12 wow fadeInUp">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-money"></i></div>
                        <h6><a href="#" class="tran3s">$100+ Signup Bonus</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="col-md-2 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-financial-chart-loss"></i></div>
                        <h6><a href="#" class="tran3s">0% Interest</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="col-md-2 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-diploma-roll"></i></div>
                        <h6><a href="#" class="tran3s">Top Offers</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="col-md-2 col-sm-6 col-xs-12 wow fadeInUp">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="flaticon-transfer"></i></div>
                        <h6><a href="#" class="tran3s">Balance Transfer</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="col-md-2 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-dollar-symbol"></i></div>
                        <h6><a href="#" class="tran3s">Cash Back</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-plane"></i></div>
                        <h6><a href="#" class="tran3s">Airline Miles</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="col-md-2 col-sm-6 col-xs-12 wow fadeInUp">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-giftbox"></i></div>
                        <h6><a href="#" class="tran3s">Business</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="col-md-2 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-line-chart"></i></div>
                        <h6><a href="#" class="tran3s">Build Credit</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="col-md-2 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-diploma-and-hat-of-graduate"></i></div>
                        <h6><a href="#" class="tran3s">Student</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="col-md-2 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="single-offer">
                        <div id="hexagon" class="f-p-bg-color tran3s"><i class="icon flaticon-calendar"></i></div>
                        <h6><a href="#" class="tran3s">No Annual Fee</a></h6>
                        <p>
                        </p>
                    </div> <!-- /.single-offer -->
                </div> <!-- /.col- -->
                <div class="clearfix"></div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.finance-offer -->


    <!--
    =============================================
        Our Service
    ==============================================
    -->
    <div class="our-service-style-one">
        <div class="container">
            <div class="finance-title-one">
                <h3>Top Rated Offers from Our Partners</h3>
                <h6>Explore a list of top cards from our Partners evaluated monthly</h6>
                <a href="#" class="tran3s button-four">See all Services</a>
            </div> <!-- /.finance-title-one -->

            <div class="row">
                <div class="col-md-4 col-xs-6 wow fadeInUp">
                    <div class="single-service tran3s">
                        <i class="icon flaticon-sheet"></i>
                        <h5><a href="services-details.html" class="tran3s">Financial Planing <span>01</span></a></h5>
                        <p>There are many variat passage lore  available jakar  large have suffered than seeker </p>
                        <a href="services-details.html" class="tran3s learn-more">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
                <div class="col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="single-service tran3s">
                        <i class="icon flaticon-technology"></i>
                        <h5><a href="services-details.html" class="tran3s">Investment Plan <span>02</span></a></h5>
                        <p>There are many variat passage lore  available jakar  large have suffered than seeker </p>
                        <a href="services-details.html" class="tran3s learn-more">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
                <div class="col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="single-service tran3s">
                        <i class="icon flaticon-umbrella"></i>
                        <h5><a href="services-details.html" class="tran3s">Insurance Policy <span>03</span></a></h5>
                        <p>There are many variat passage lore  available jakar  large have suffered than seeker </p>
                        <a href="services-details.html" class="tran3s learn-more">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
                <div class="col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-service tran3s">
                        <i class="icon flaticon-technology"></i>
                        <h5><a href="services-details.html" class="tran3s">Investment Plan <span>04</span></a></h5>
                        <p>There are many variat passage lore  available jakar  large have suffered than seeker </p>
                        <a href="services-details.html" class="tran3s learn-more">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
                <div class="col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="single-service tran3s">
                        <i class="icon flaticon-umbrella"></i>
                        <h5><a href="services-details.html" class="tran3s">Insurance Policy <span>05</span></a></h5>
                        <p>There are many variat passage lore  available jakar  large have suffered than seeker </p>
                        <a href="services-details.html" class="tran3s learn-more">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
                <div class="col-md-4 col-xs-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="single-service tran3s">
                        <i class="icon flaticon-umbrella"></i>
                        <h5><a href="services-details.html" class="tran3s">Insurance Policy <span>06</span></a></h5>
                        <p>There are many variat passage lore  available jakar  large have suffered than seeker </p>
                        <a href="services-details.html" class="tran3s learn-more">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.our-service -->


    <!--
    =============================================
        Our Blog
    ==============================================
    -->
    <div class="our-blog-one">
        <div class="container">
            <h2>Credit Card Tools</h2>
            <div class="row">
                <div class="blog-grid-post col-md-12 col-xs-12">
                    <div class="row">
                        @if(count($posts)  > 0)
                            @foreach($posts as $post)
                                <div class="col-sm-4">
                                    <div class="single-blog">
                                        <div class="img">
                                            @if($post->image)
                                                <img src="{{ $post->image }}" alt="{{ $post->post_title }}">
                                            @endif
                                        </div>
                                        <div class="post">
                                            <span>{{ date('d F Y', strtotime($post->post_date)) }}  <!--/  {{ $post->post_category }}--></span>
                                            <h5><a href="{{ $post->url }}" class="tran3s">{{ $post->title }}</a></h5>
                                            <p>
	                                            <?php
	                                            echo $string = (strlen($post->post_content) > 103) ? substr($post->post_content,0,100).'...': $post->post_content;
	                                            ?>
                                            </p>
                                            <a href="{{ $post->url }}" class="learn-more tran3s">Learn More</a>
                                        </div> <!-- /.post -->
                                    </div> <!-- /.single-blog -->
                                </div> <!-- /.col- -->
                            @endforeach
                        @else
                            No Blog Post for now
                        @endif
                    </div> <!-- /.row -->
                </div> <!-- /.blog-grid-post -->
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.our-blog -->


    <!--
    =============================================
        Goolge-map
    ==============================================
    -->
    <div class="map-canvas" style="display: none;"></div>


    <!--
    =============================================
        Partner Logo
    ==============================================
    -->
    <div class="partners-section">
        <div class="container">
            <div class="row">
                <div id="partner-logo" class="pfix">
                    <div class="item"><img src="images/logo/p5.png" alt="logo"></div>
                    <div class="item"><img src="images/logo/p6.png" alt="logo"></div>
                    <div class="item"><img src="images/logo/p7.png" alt="logo"></div>
                    <div class="item"><img src="images/logo/p8.png" alt="logo"></div>
                    <div class="item"><img src="images/logo/p6.png" alt="logo"></div>
                </div> <!-- End .partner_logo -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- Javascript here --}}
    <!-- Theme js -->
    <script type="text/javascript" src="js/theme.js"></script>
    <!--<script type="text/javascript" src="js/map-script.js"></script>-->
@endsection