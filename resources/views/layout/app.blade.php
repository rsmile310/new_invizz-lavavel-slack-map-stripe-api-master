<html>
    <head>
        <title>INVIZZ - @yield('title')</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('css/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/map.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/dialog.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/vanillatoasts.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/alerts.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/list.css') }}" rel="stylesheet">
        
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/vanillatoasts.js') }}"></script>
        <script src="{{ asset('assets/js/cute-alert.js') }}"></script>
        <script src="{{ asset('assets/js/dist/tata.js') }}"></script>
        
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <script src='http://maps.googleapis.com/maps/api/js?v=3&amp;libraries=places&key=AIzaSyBM9X8u2sBiuXwtbHEyCNBddrpf_s2a2Z8'></script>
        <!-- =======================================================
        * Template Name: BizLand - v2.0.3
        * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head> 
    <body>
    @include('scripts.gmaps-address-lookup-api3')

        @section('sidebar')
            @if($pages != 'map')
                <!-- ======= Top Bar ======= -->
                <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
                    <div class="container d-flex">
                    <div class="contact-info me-auto">
                        <i class="icofont-envelope"></i> <a href="mailto:stevegagz9@gmail.com">info@invizz.io</a>
                    </div>
                    <div class="social-links">
                        <a href="https://twitter.com/___invizz" class="twitter" style="margin-top:3px;"><i class="icofont-twitter"></i></a>
                    </div>
                    </div>
                </div>

                <!-- ======= Header ======= -->
                <header id="header" class="fixed-top">
                    <div class="container d-flex align-items-center">

                    <h1 class="logo me-auto">
                        <a href="/">
                            <img src="{{ asset('assets/img/logo.png') }}"/>
                        </a>
                    </h1>
                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="active"><a href="/" style="padding-bottom: 24px;padding-top: 24px;">Home</a></li>
                            @guest
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#login-modal" data-ticket-type="premium-access" style="padding-bottom: 24px;padding-top: 24px;">Login</a></li>
                            @else
                                <li class="drop-down">  <a href="#"><img src="@if(Auth::User()->profile->avatar_src){{Auth::User()->profile->avatar_src}}@else{{ asset('assets/img/artists/avatar.jpg')}} @endif" style="width:40px;height:40px;border-radius:50%;"/> </a>
                                    <ul>
                                        <li><a class="dropdown-item" href="/profile/{{Auth::user()->id}}"><span class="iconify" data-icon="noto:gear" data-inline="false" style="font-size: 25px;margin-right: 5px;"></span>Profile Setting</a>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            <span class="iconify" data-icon="emojione:outbox-tray" data-inline="false" style="font-size: 25px;margin-right: 5px;"></span> {{ __('Logout') }}
                                            </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                        </li>
                    
                                    </ul>
                                </li>
                            @endguest

                        </ul>
                    </nav><!-- .nav-menu -->

                    </div>
                </header><!-- End Header -->
                @endif
            @show

        @yield('content')
    </body>
</html>