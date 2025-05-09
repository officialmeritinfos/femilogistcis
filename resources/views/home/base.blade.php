
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('home/css/animate.css')}}">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{asset('home/css/icofont.min.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
    <!--  Owl Carousel Theme CSS -->
    <link rel="stylesheet" href="{{asset('home/css/owl.theme.default.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('home/css/magnific-popup.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('home/css/meanmenu.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="{{asset('home/css/dark.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
    <!-- Title CSS -->
    <title>{{$pageName}} - {{$siteName}}</title>
    <!-- Favicon Link -->
    <link rel="icon" type="image/png" href="{{asset('home/img/'.$web->logo)}}">
    @stack('css')
    <style>
        .watkey {
            z-index: 9;
            position: fixed;
            bottom: 15px;
            left: 15px;
            padding: 4px;
            border: 1px solid #0d9f16;
            border-radius: 50%;
        }
    </style>

    <style>
        /* Custom CSS for the Float widget */
        .telegram-float-widget {
            position: fixed;
            left: 10px;
            /* Adjust the left positioning as needed */
            bottom: 10rem;
            /* Adjust the bottom positioning as needed */
            z-index: 9999;
        }

        .whatsapp-float-widget {
            position: fixed;
            left: 70px;
            /* Adjust the left positioning as needed */
            bottom: 10px;
            /* Adjust the bottom positioning as needed */
            z-index: 9999;
        }
    </style>
</head>
<body>
<!-- PreLoader Start -->
<div class="loader-content">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>
</div>
<!-- PreLoader End -->

<!-- Header Area Start -->
<div class="header-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="header-left">
                    <ul>
                        <li>
                            <a href="mailto:{{$web->email}}">
                                <i class="icofont-ui-message"></i>
                                <span >{{$web->email}}</span>
                            </a>
                        </li>
                        @if($web->phone)
                            <li>
                                <a href="tel:{{$web->phone}}">
                                    <i class="icofont-phone"></i>
                                    {{$web->phone}} (For Whatsapp Call)
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="header-right">
                    <ul class="header-social">
                        <li>
                            <div id="google_translate_element"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End -->

<!-- Navbar Area Start -->
<div class="navbar-area">
    <!-- For Mobile Device -->
    <div class="mobile-nav">
        <a href="index" class="logo">
            <img src="{{asset('home/img/'.$web->logo)}}" class="main-logo" alt="logo" style="width: 70px;">
            <img src="{{asset('home/img/'.$web->logo2)}}" class="white-logo" alt="logo" style="width: 70px;">
        </a>
    </div>

    <!-- For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index">
                    <img src="{{asset('home/img/'.$web->logo)}}" class="main-logo" alt="logo" style="width: 80px;">
                    <img src="{{asset('home/img/'.$web->logo2)}}" class="white-logo" alt="logo" style="width: 80px;">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('about')}}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Services</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{url('tour')}}" class="nav-link">Tour</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('travel')}}" class="nav-link">Travel</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('logistics')}}" class="nav-link">Logistics</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('visa')}}" class="nav-link">Visa Preparation</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('flight-tracking')}}" class="nav-link">Flight Tracking</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Tracking</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{route('home')}}#tracking-package" class="nav-link">Track Package</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('home')}}#tracking-flight" class="nav-link">Track Flight</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('flight-booking')}}" class="nav-link">Flight Booking</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{url('faqs')}}" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('privacy')}}" class="nav-link">Privacy policy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('terms')}}" class="nav-link">Terms & Conditions</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{$web->whatsappSupport}}" target="_blank" class="nav-link">Call On Whatsapp</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('contact')}}" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar Area End -->
@yield('content')
<!-- Newsletter Section Start -->
<div class="newsletter-section">
    <div class="container">
        <div class="newsletter-area">
            <h2>Join Newsletter For Daily Update</h2>
            <div class="col-lg-6 p-0">
                <form class="newsletter-form" data-bs-toggle="validator">
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="EMAIL" required autocomplete="off">

                    <button class="default-btn electronics-btn" type="submit">
                        Subscribe Now
                    </button>

                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>
            <img src="{{asset('home/img/newsletter-img.png')}}" alt="newsletter image">
        </div>
    </div>
</div>
<!-- Newsletter Section End -->

<!-- Footer Area Start -->
<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <a href="index">
                        <img src="{{asset('home/img/'.$web->logo2)}}" alt="logo">
                    </a>
                    <ul>
                        @if($web->phone)
                            <li>
                                <i class="icofont-phone"></i>
                                <a href="tel:{{$web->phone}}">
                                    {{$web->phone}} (For Whatsapp Calls & Text)
                                </a>
                            </li>
                        @endif

                        <li>
                            <i class="icofont-ui-message"></i>
                            <a href="mailto:{{ $web->email }}">
                                <span >{{ $web->email }}</span>
                            </a>
                        </li>

                        <li>
                            <i class="icofont-location-pin"></i>
                            {{ $web->address }}
                        </li>
                    </ul>

                    <div class="footer-social">
                        <a href="https://www.facebook.com/login/" target="_blank">
                            <i class="icofont-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="icofont-instagram"></i>
                        </a>
                        <a href="https://twitter.com/i/flow/login" target="_blank">
                            <i class="icofont-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/" target="_blank">
                            <i class="icofont-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>Our Services</h3>
                    <ul>
                        <li>
                            <a href="{{url('tour')}}">Tour</a>
                        </li>
                        <li>
                            <a href="{{url('flight-tracking')}}">Flight Tracking</a>
                        </li>
                        <li>
                            <a href="{{url('logistics')}}">Logistics</a>
                        </li>
                        <li>
                            <a href="{{url('travel')}}">Travel</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>Our Support</h3>
                    <ul>
                        <li>
                            <a href="{{url('privacy')}}">Privacy & Policy</a>
                        </li>
                        <li>
                            <a href="{{url('faq')}}">FAQS</a>
                        </li>
                        <li>
                            <a href="{{url('terms')}}">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="{{url('contact')}}">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{url('about')}}">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>Quick Links</h3>
                    <ul>
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{url('about')}}">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <p>© <span>{{$siteName}}</span>. License number <a href="#">{{$web->licenseNumber}}</a> </p>
    </div>

    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <div class="telegram-float-widget">
        <a href="https://wa.me/{{$web->phone}}" target="_blank">
            <img src="https://cdn2.iconfinder.com/data/icons/social-media-applications/64/social_media_applications_23-whatsapp-256.png"
                 alt="" width="50">
        </a>
    </div>
</footer>
<!-- Footer Area End -->

<!-- Back top Button -->
<div class="top-btn">
    <i class="icofont-scroll-bubble-up"></i>
</div>

<!-- jQuery first, then Bootstrap JS -->
<script src="{{asset('home/js/jquery.min.js')}}"></script>
<script src="{{asset('home/js/bootstrap.bundle.min.js')}}"></script>
<!-- Subscribe From JS -->
<script src="{{asset('home/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator JS -->
<script src="{{asset('home/js/form-validator.min.js')}}"></script>
<!-- Contact JS -->
<script src="{{asset('home/js/contact-form-script.js')}}"></script>
<!-- Owl Carousel Slider JS -->
<script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
<!-- WOW JS -->
<script src="{{asset('home/js/wow.min.js')}}"></script>
<!-- Meanmenu JS -->
<script src="{{asset('home/js/meanmenu.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('home/js/custom.js')}}"></script>
<script type="text/javascript">
    window.onload = function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

@stack('js')
</body>
</html>
