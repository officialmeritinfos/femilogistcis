<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/bootstrap.min.css')}}">
    <!-- Owl Theme Default Min CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/owl.theme.default.min.css')}}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/owl.carousel.min.css')}}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/animate.min.css')}}">
    <!-- Remixicon CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/remixicon.css')}}">
    <!-- boxicons CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/boxicons.min.css')}}">
    <!-- MetisMenu Min CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/metismenu.min.css')}}">
    <!-- Simplebar Min CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/simplebar.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/style.css')}}">
    <!-- Dark Mode CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/dark-mode.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/user/css/responsive.css')}}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('home/images/'.$web->logo)}}">
    <!-- Title -->
    <title>{{$pageName}} - {{$siteName}}</title>
</head>

<body class="body-bg-f5f5f5">
<!-- Start Preloader Area -->
<div class="preloader">
    <div class="content">
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader Area -->

<!-- Start Sidebar Area -->
<div class="side-menu-area">
    <div class="side-menu-logo bg-linear">
        <a href="{{url('account/dashboard')}}" class="navbar-brand d-flex align-items-center">
            <img src="{{asset('home/images/'.$web->logo)}}" alt="image">
            <span>{{$siteName}}</span>
        </a>

        <div class="burger-menu d-none d-lg-block">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>

    <nav class="sidebar-nav" data-simplebar>
        <ul id="sidebar-menu" class="sidebar-menu">
            <li class="nav-item-title">MENU</li>

            <li>
                <a href="{{url('account/dashboard')}}" class="box-style">
                    <i class="ri-home-2-fill"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
{{--            <li>--}}
{{--                <a href="#" class="has-arrow box-style">--}}
{{--                    <i class="ri-money-dollar-box-line"></i>--}}
{{--                    <span class="menu-title">Deposit</span>--}}
{{--                </a>--}}

{{--                <ul class="sidemenu-nav-second-level">--}}
{{--                    <li>--}}
{{--                        <a href="{{url('account/new_deposit')}}" >--}}
{{--                            <span class="menu-title">New Deposit</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{url('account/deposits')}}">--}}
{{--                            <span class="menu-title">Deposit List</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <li>
                <a href="#" class="has-arrow box-style">
                    <i class="ri-building-line"></i>
                    <span class="menu-title">Investment</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li>
                        <a href="{{url('account/new_investment')}}">
                            <span class="menu-title">Deposit</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('account/investments')}}">
                            <span class="menu-title">Deposit History</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="has-arrow box-style">
                    <i class="ri-send-plane-fill"></i>
                    <span class="menu-title">Withdrawal</span>
                </a>

                <ul class="sidemenu-nav-second-level">

                    <li>
                        <a href="{{url('account/withdrawals')}}">
                            <span class="menu-title">Withdrawals</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('account/new_withdrawals')}}">
                            <span class="menu-title">New Withdrawal</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{route('transfer.index')}}" class="box-style">
                    <i class="bx bx-send"></i>
                    <span class="menu-title">Transfer Funds </span>
                </a>
            </li>

            <li>
                <a href="{{route('subtrade.index')}}" class="box-style">
                    <i class="bx bx-user-plus"></i>
                    <span class="menu-title">Managed Accounts </span>
                </a>
            </li>

            <li>
                <a href="{{url('account/referral')}}" class="box-style">
                    <i class="bx bx-user-plus"></i>
                    <span class="menu-title">Referrals </span>
                </a>
            </li>
            @if($user->is_admin==1)
                <li>
                    <a href="{{route('admin.admin.dashboard')}}" class="box-style">
                        <i class="bx bx-user-check"></i>
                        <span class="menu-title">Admin </span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{url('account/settings')}}" class="box-style">
                    <i class="bx bx-cog"></i>
                    <span class="menu-title">Settings </span>
                </a>
            </li>
            <li>
                <a href="{{route('setting.kyc')}}" class="box-style">
                    <i class="bx bx-check-circle"></i>
                    <span class="menu-title">KYC </span>
                </a>
            </li>

            <li>
                <a href="{{url('account/logout')}}" class="box-style">
                    <i class="bx bx-log-out"></i>
                    <span class="menu-title">Logout </span>
                </a>
            </li>


        </ul>


        <div class="dark-bar">
            <a href="#" class="d-flex align-items-center">
                <span class="dark-title">Enable Dark Theme</span>
            </a>

            <div class="form-check form-switch">
                <input type="checkbox" class="checkbox" id="darkSwitch">
            </div>
        </div>
    </nav>
</div>
<!-- End Sidebar Area -->

<!-- Start Main Content Area -->
<div class="main-content d-flex flex-column">
    <div class="container-fluid">
        <nav class="navbar main-top-navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="responsive-burger-menu d-block d-lg-none">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </div>



                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link ri-fullscreen-btn" id="fullscreen-button">
                            <i class="ri-fullscreen-line"></i>
                        </a>
                    </li>



                    <li class="nav-item dropdown profile-nav-item">
                        <a class="nav-link dropdown-toggle avatar" href="#" id="navbarDropdown-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{empty($user->photo)?'https://ui-avatars.com/api/?name='.$user->name:asset('dashboard/user/images/'.$user->photo)}}" alt="Images" class="rounded-circle"
                            style="width: 50px;">
                            <h3>{{$user->name}}</h3>
                            <span>Investor</span>
                        </a>

                        <div class="dropdown-menu">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <img src="{{empty($user->photo)?'https://ui-avatars.com/api/?name='.$user->name:asset('dashboard/user/images/'.$user->photo)}}" class="rounded-circle" alt="image">
                                </div>

                                <div class="info text-center">
                                    <span class="name">{{$user->name}}</span>
                                    <p class="mb-3 email">
                                        <a>
                                            <span class="__cf_email__">
                                                {{$user->email}}
                                            </span>
                                        </a>
                                    </p>
                                    <p class="mb-3 email">
                                        <a>
                                            <span class="__cf_email__">
                                                {{$user->userRef}}
                                            </span>
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="dropdown-body">
                                <ul class="profile-nav p-0 pt-3">
                                    <li class="nav-item">
                                        <a href="{{url('account/settings')}}" class="nav-link">
                                            <i class="ri-user-line"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>

                            <div class="dropdown-footer">
                                <ul class="profile-nav">
                                    <li class="nav-item">
                                        <a href="{{url('account/logout')}}" class="nav-link">
                                            <i class="ri-login-circle-line"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ri-settings-5-line"></i>
                        </a>
                    </li>
                    -->
                </ul>
            </div>
        </nav>
    </div>
    <!-- Start Main Content Area -->
    <div class="mt-5">

        @yield('content')

    </div>

    <div class="flex-grow-1"></div>

    <div class="footer-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="copy-right">
                        <p>Copyright @ {{date('Y')}} {{$siteName}}. </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Main Content Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class="ri-arrow-up-s-fill"></i>
    <i class="ri-arrow-up-s-fill"></i>
</div>
<!-- End Go Top Area -->

<!-- Jquery Min JS -->
<script src="{{asset('dashboard/user/js/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle Min JS -->
<script src="{{asset('dashboard/user/js/bootstrap.bundle.min.js')}}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{asset('dashboard/user/js/owl.carousel.min.js')}}"></script>
<!-- Metismenu Min JS -->
<script src="{{asset('dashboard/user/js/metismenu.min.js')}}"></script>
<!-- Simplebar Min JS -->
<script src="{{asset('dashboard/user/js/simplebar.min.js')}}"></script>
<!-- mixitup Min JS -->
<script src="{{asset('dashboard/user/js/mixitup.min.js')}}"></script>
<!-- Dark Mode Switch Min JS -->
<script src="{{asset('dashboard/user/js/dark-mode-switch.min.js')}}"></script>
<!-- Apexcharts Min JS -->
<script src="{{asset('dashboard/user/js/apexcharts/apexcharts.min.js')}}"></script>
<!-- Charts Custom Min JS -->
{{--<script src="{{asset('dashboard/user/js/charts-custom.js')}}"></script>--}}
<!-- Form Validator Min JS -->
<script src="{{asset('dashboard/user/js/form-validator.min.js')}}"></script>
<!-- Contact JS -->
<script src="{{asset('dashboard/user/js/contact-form-script.js')}}"></script>
<!-- Ajaxchimp Min JS -->
<script src="{{asset('dashboard/user/js/ajaxchimp.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('dashboard/user/js/custom.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
<script>
    new ClipboardJS('.copy');
</script>
@stack('js')
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = 'b5e5325bbdfaeb6f7b4eb11f8aa8f1b3ede3ef21';
    window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
</body>
</html>
