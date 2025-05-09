<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Comprehensive financial advice and investment services that are tailored to meet your individual needs.">
    <meta name="keywords" content="finance, invest, goal, values, income, earnings, gold, forex, equity">
    <meta name="url" content="/">

    <meta name="og:title" content="{{$siteName}}"/>
    <meta name="og:type" content="company"/>
    <meta name="og:url" content="/"/>
    <meta name="og:image" content="{{asset('home/images/'.$web->logo)}}"/>
    <meta name="og:site_name" content="{{$siteName}}"/>
    <meta name="og:description" content="Comprehensive financial advice and investment services that are tailored to meet your individual needs."/>
    <meta name="description" content="{{$web->description}}">
    <meta name="keywords" content="business, marketing, agency">
    <title> {{$siteName}} | {{$pageName}}</title>
    <!-- favicons Icons -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('home/images/'.$web->logo)}}" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{asset('home/vendors/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/animate/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/animate/custom-animate.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/jarallax/jarallax.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/nouislider/nouislider.pips.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/odometer/odometer.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/swiper/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/corle-icons/style.css')}}">
    <link rel="stylesheet" href="{{asset('home/vendors/tiny-slider/tiny-slider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/reey-font/stylesheet.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/gordita-font/stylesheet.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/owl-carousel/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/bootstrap-select/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/vegas/vegas.min.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/timepicker/timePicker.css')}}" />
    <link rel="stylesheet" href="{{asset('home/vendors/nice-select/nice-select.css')}}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{asset('home/css/corle.css')}}" />
    <link rel="stylesheet" href="{{asset('home/css/corle-responsive.css')}}" />
</head>

<body>
@inject('injected','App\Defaults\Custom')


<div class="preloader">
    <div class="preloader__image"></div>
</div>
<!-- /.preloader -->




<div class="page-wrapper">
    <header class="main-header">
        <div class="main-header__top">
            <div class="main-header__top-wrapper">
                <div class="main-header__top-inner">
                    <div class="main-header__top-left">
                        <div class="main-header__logo">
                            <a href="{{url('/')}}"><img src="{{asset('home/images/'.$web->logo)}}" alt=""></a>
                        </div>
                        <div class="main-header__location-box">
                            <div class="main-header__location-icon">
                                <span class="icon-location1"></span>
                            </div>
                            <p class="main-header__location-text">{!! $web->address !!}</p>
                        </div>
                    </div>
                    <div class="main-header__top-right">
                        <ul class="main-header__contact-list list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-email-3"></span>
                                </div>
                                <div class="content">
                                    <p>You may send an email</p>
                                    <h4><a href="mailto:{{$web->email}}">{{$web->email}}</a></h4>
                                </div>
                            </li>
                            @if(!empty($web->phone))
                                <li>
                                    <div class="icon">
                                        <span class="icon-phone"></span>
                                    </div>
                                    <div class="content">
                                        <p>Please contact us at</p>
                                        <h4><a href="tel:{{$web->phone}}">{{$web->phone}} </a></h4>
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <div class="main-header__social">
                            <a href="#"><span class="icon-linkedin"></span></a>
                            <a href="#"><span class="icon-twitter"></span></a>
                            <a href="#"><span class="icon-facebook"></span></a>
                            <a href="#"><span class="icon-skype"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="main-menu">
            <div class="main-menu__wrapper">
                <div class="container">
                    <div class="main-menu__wrapper-inner">
                        <div class="main-menu__left">
                            <div class="main-menu__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li>
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{url('about')}}">About</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="{{url('plans')}}">Plans</a></li>
                                            <li><a href="{{url('faqs')}}">Frequently Asked Questions</a></li>
                                            <li><a href="{{url('terms')}}">Terms & Conditions</a></li>
                                            <li><a href="{{url('privacy')}}">Privacy policy</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Services</a>
                                        <ul>
                                            @foreach($injected->getServices() as $service)
                                                <li><a href="{{route('service.details',['id'=>$service->id])}}">{{$service->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{url('contact')}}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="main-menu__right">
                            <div class="main-menu__consultant-search">
                                <div class="main-menu__consultant-box">
                                    <p class="main-menu__consultant-text">Get Started</p>
                                    <a href="{{route('register')}}" class="main-menu__consultant-btn">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

    @yield('content')

    <!--Contact One STart-->
    <section class="contact-one">
        <div class="contact-one__wrap">
            <div class="container">
                <div class="contact-one__inner">
                    <ul class="contact-one__contact-list list-unstyled">
                        <li>
                            <div class="icon">
                                <span class="icon-location-filled-1"></span>
                            </div>
                            <div class="contact">
                                <p class="contact-one__text">
                                    {!! $web->address !!}
                                </p>
                            </div>
                        </li>
                        @if(!empty($web->phone))
                            <li>
                                <div class="icon">
                                    <span class="icon-phone-auricular"></span>
                                </div>
                                <div class="contact">
                                    <p class="contact-one__text-2">Get In Touch</p>
                                    <a href="tel:{{$web->phone}}">{{$web->phone}}</a>
                                </div>
                            </li>
                        @endif
                        <li>
                            <div class="icon">
                                <span class="icon-email-3"></span>
                            </div>
                            <div class="contact">
                                <p class="contact-one__text-2">Quick Email us</p>
                                <a href="mailto:{{$web->email}}">{{$web->email}}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Contact One End-->

    <!--Site Footer Start-->
    <footer class="site-footer">
        <div class="site-footer__shape-1 float-bob-x">
            <img src="{{asset('home/images/shapes/site-footer-shape-1.png')}}" alt="">
        </div>
        <div class="site-footer__shape-2 img-bounce">
            <img src="{{asset('home/images/shapes/site-footer-shape-2.png')}}" alt="">
        </div>
        <div class="site-footer__shape-3 float-bob-y">
            <img src="{{asset('home/images/shapes/site-footer-shape-3.png')}}" alt="">
        </div>
        <div class="site-footer__shape-4 img-bounce">
            <img src="{{asset('home/images/shapes/site-footer-shape-4.png')}}" alt="">
        </div>
        <div class="site-footer__shape-5 float-bob-x">
            <img src="{{asset('home/images/shapes/site-footer-shape-5.png')}}" alt="">
        </div>
        <div class="site-footer__shape-6 float-bob-y">
            <img src="{{asset('home/images/shapes/site-footer-shape-6.png')}}" alt="">
        </div>
        <div class="site-footer__top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__about">
                            <div class="footer-widget__logo">
                                <a href="{{url('/')}}"><img src="{{asset('home/images/'.$web->logo)}}"
                                                            alt=""></a>
                            </div>
                            <div class="footer-widget__location">
                                <p class="footer-widget__location-title">Headquarters</p>
                                <p class="footer-widget__location-text">
                                {!! $web->address !!}
                                @if(!empty($web->phone))
                                    <h4 class="footer-widget__location-number"><a href="#">{{$web->phone}}</a></h4>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="footer-widget__column footer-widget__explore">
                            <div class="footer-widget__title-box">
                                <h4 class="footer-widget__title">Explore Link</h4>
                            </div>
                            <ul class="footer-widget__explore-list list-unstyled">
                                <li><a href="{{url('about')}}">About us</a></li>
                                <li><a href="{{url('contact')}}">Contact Us</a></li>
                                <li><a href="{{url('plans')}}">Plans</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="footer-widget__column footer-widget__explore">
                            <div class="footer-widget__title-box">
                                <h4 class="footer-widget__title">Service</h4>
                            </div>
                            <ul class="footer-widget__explore-list list-unstyled">
                                @foreach($injected->getServices() as $service)
                                    <li><a href="{{route('service.details',['id'=>$service->id])}}">{{$service->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="site-footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site-footer__bottom-inner">
                            <div class="site-footer__social">
                                <p class="site-footer__social-tag">Social</p>
                                <ul class="site-footer__social-box list-unstyled">
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <p class="site-footer__bottom-text">© {{date('Y')}} {{$siteName}} All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Site Footer End-->


</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="{{url('/')}}" aria-label="logo image"><img src="{{asset('home/images/'.$web->logo)}}" width="150"
                                                                alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:{{$web->email}}">{{$web->email}}</a>
            </li>
            @if(!empty($web->phone))
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:{{$web->phone}}">{{$web->phone}}</a>
                </li>
            @endif
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-facebook-square"></a>
                <a href="#" class="fab fa-pinterest-p"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->



<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


<script src="{{asset('home/vendors/jquery/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('home/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home/vendors/jarallax/jarallax.min.js')}}"></script>
<script src="{{asset('home/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('home/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
<script src="{{asset('home/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
<script src="{{asset('home/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('home/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('home/vendors/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('home/vendors/odometer/odometer.min.js')}}"></script>
<script src="{{asset('home/vendors/swiper/swiper.min.js')}}"></script>
<script src="{{asset('home/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
<script src="{{asset('home/vendors/wnumb/wNumb.min.js')}}"></script>
<script src="{{asset('home/vendors/wow/wow.js')}}"></script>
<script src="{{asset('home/vendors/isotope/isotope.js')}}"></script>
<script src="{{asset('home/vendors/countdown/countdown.min.js')}}"></script>
<script src="{{asset('home/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('home/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('home/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('home/vendors/vegas/vegas.min.js')}}"></script>
<script src="{{asset('home/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('home/vendors/timepicker/timePicker.js')}}"></script>
<script src="{{asset('home/vendors/circleType/jquery.circleType.js')}}"></script>
<script src="{{asset('home/vendors/circleType/jquery.lettering.min.js')}}"></script>
<script src="{{asset('home/vendors/sidebar-content/jquery-sidebar-content.js')}}"></script>
<script src="{{asset('home/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
<!-- template js -->
<script src="{{asset('home/js/corle.js')}}"></script>
<!-- Google language start -->
<style>

    #google_translate_element {
        z-index: 9999999;
        position: fixed;
        bottom: 25px;
        left: 15px;
    }

    .goog-te-gadget {
        font-family: Roboto, "Open Sans", sans-serif !important;
        text-transform: uppercase;
    }
    .goog-te-gadget-simple
    {
        padding: 0px !important;
        line-height: 1.428571429;
        color: white;
        vertical-align: middle;
        background-color: black;
        border: 1px solid #a5a5a599;
        border-radius: 4px;
        float: right;
        margin-top: -4px;
        z-index: 999999;
    }
    .goog-te-banner-frame.skiptranslate
    {
        display: none !important;
        color: white;
    }
    .goog-te-gadget-icon
    {
        background: none !important;
        display: none;
        color: white;
    }
    .goog-te-gadget-simple .goog-te-menu-value
    {
        font-size: 12px;
        color: white;
        font-family: 'Open Sans' , sans-serif;
    }
</style>
<div id="google_translate_element"></div>
<script type="text/javascript">
    window.onload = function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- start popup massage -->
<div class="notifier" style="display: none;">
    <div class="txt" style="color:black;">While you are waiting,someone from <b></b> just traded with <a href="javascript:void(0);" onclick="javascript:void(0);"></a></div>
</div>
<style>
    .notifier{
        border-radius: 7px;
        position: fixed;
        z-index: 90;
        bottom: 80px;
        right: 50px;
        background: #fff;
        padding: 15px 40px;
        box-shadow: 0px 5px 13px 0px rgba(0,0,0,.3);
    }
    .notifier a {
        font-weight: 700;
        display: block;
        color:#0080FF;
    }
    .notifier a, .notifier a:active {
        transition: all .2s ease;
        color:#0080FF;
    }
</style>
<script data-cfasync="false" src="#"></script><script type="text/javascript">
    var listCountries = ['Germany', 'Spain', 'Russia', 'Italy',
        'Italy',  'United States', 'Egypt',
        'United Kingdom', "United States","England","Germany","Germany","United States","Switzerland",
        "Austria","Austria","Austria","Australia","Australia","Australia","Russia","Russia",
        "United States","United Kingdom","Spain","Spain","India","England","Italy","Ukraine"
    ];
    var listPlans = ['$500','$5000','$1,000','$1000','$550','$3000','$690', '$360',
        '$700', '$600',"$500","$700","$1,000","$1289","$5000","$7000","$10000"];
    interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
    var run = setInterval(request, interval);

    function request() {
        clearInterval(run);
        interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
        var country = listCountries[Math.floor(Math.random() * listCountries.length)];
        var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
        var msg = 'While you are still contemplating ,an investor from <b>' + country + '</b> ' +
            'just traded with <a href="javascript:void(0);" onclick="javascript:void(0);">' + plan + ' .</a>';
        $(".notifier .txt").html(msg);
        $(".notifier").stop(true).fadeIn(300);
        window.setTimeout(function() {
            $(".notifier").stop(true).fadeOut(300);
        }, 6000);
        run = setInterval(request, interval);
    }
</script>
<!-- end popup massage -->
@stack('js')
</body>
</html>
