<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Arcke - Architecture HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('assets/images/fav-icon/icon.png') }}">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" media="all">
    <!-- carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css" media="all">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" type="text/css" media="all">
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animated-text.css') }}" type="text/css" media="all">
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" type="text/css" media="all">
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" type="text/css" media="all">
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme-default.css') }}" type="text/css" media="all">
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}" type="text/css" media="all">
    <!-- transitions CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}" type="text/css" media="all">
    <!-- venobox CSS -->
    <link rel="stylesheet" href="{{ asset('venobox/venobox.css') }}" type="text/css" media="all">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}" type="text/css" media="all">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" media="all">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" type="text/css" media="all">

    <!-- modernizr js -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
</head>

<body>


    <!-- loder -->
    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loder-section left-section"></div>
        <div class="loder-section right-section"></div>
    </div>


    @include('layout.header')

    @yield('content')

    @include('layout.footer')

    <div class="search-popup">
        <button class="close-search style-two"><i class="fa fa-times"></i></button>
        <button class="close-search"><i class="fas fa-arrow-up"></i></button>
        <form method="post" action="#">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <!--==================================================-->
    <!-- Start scrollup section Area -->
    <!--==================================================-->
    <div class="prgoress_indicator">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!--==================================================-->
    <!-- Start scrollup section Area -->
    <!--==================================================-->



    <!--==================================================-->
    <!-- Start Curser Section Here -->
    <!--==================================================-->
    <div class="curser"></div>
    <div class="curser2"></div>
    <!--==================================================-->
    <!-- Ends Curser Section Here -->
    <!--==================================================-->



    <!-- jquery js -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.2.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- carousel js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- counterup js -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <!-- imagesloaded js -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- venobox js -->
    <script src="{{ asset('venobox/venobox.js') }}"></script>
    <!--  animated-text js -->
    <script src="{{ asset('assets/js/animated-text.js') }}"></script>
    <!-- venobox min js -->
    <script src="{{ asset('venobox/venobox.min.js') }}"></script>
    <!-- isotope js -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- jquery meanmenu js -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>

    <!-- jquery scrollup js -->
    <script src="{{ asset('assets/js/jquery.scrollUp.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>
    <!-- jquery js -->

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <!-- theme js -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>


</body>

</html>
