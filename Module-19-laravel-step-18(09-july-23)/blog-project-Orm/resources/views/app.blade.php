<!-- meta tags and other links -->
<!-- Header -->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title> Agency</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!-- Custom Animation -->
    <link rel="stylesheet" href="{{ asset('css/custom-animation.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <!-- line awesome -->
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <!-- Odometer -->
    <link rel="stylesheet" href="{{ asset('css/odometer.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="loader">
                    <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                    <div class="loader__ball"></div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Preloader End ====================-->

    <!--==================== Overlay Start ====================-->
    <div class="body-overlay"></div>
    <!--==================== Overlay End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="sidebar-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <!-- ==================== Scroll to Top End Here ==================== -->
    <a class="scroll-top"><i class="fas fa-angle-double-up"></i></a>
    <!-- ==================== Scroll to Top End Here ==================== -->




    @include('components.header')

    @yield('content')
    @include('components.footer')

    {{-- @yield('script') --}}


    <!-- Jquery js -->
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <!-- Appear js -->
    <script src="{{ asset('js/jquery.appear.min.js') }}"></script>
    <!-- Magnific Popup js -->
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Odometer js -->
    <script src="{{ asset('js/odometer.min.js') }}"></script>
    <!-- Viewport js -->
    <script src="{{ asset('js/viewport.jquery.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('js/main.js') }}"></script>
    
</body>

</html>
