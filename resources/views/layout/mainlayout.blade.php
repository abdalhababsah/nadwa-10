<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Al Nadwa Architects - Innovating Architecture and Engineering Solutions</title>
    <meta name="description" content="Discover Al Nadwa Architects - leaders in architecture and engineering. We create sustainable, aesthetic, and functional spaces tailored to your needs.">
    <meta name="keywords" content="Al Nadwa Architects, Architecture, Engineering, Sustainable Design, Construction, Building Solutions, Engineering Services">
    <meta name="author" content="Al Nadwa Architects">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Al Nadwa Architects - Innovating Architecture and Engineering Solutions">
    <meta property="og:description" content="Discover Al Nadwa Architects - leaders in architecture and engineering. We create sustainable, aesthetic, and functional spaces tailored to your needs.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://alnadwaarchitects.com">
    <meta property="og:image" content="{{ asset('assets/images/Artboard1.png') }}">
    <meta property="og:site_name" content="Al Nadwa Architects">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Al Nadwa Architects - Innovating Architecture and Engineering Solutions">
    <meta name="twitter:description" content="Discover Al Nadwa Architects - leaders in architecture and engineering.">
    <meta name="twitter:image" content="{{ asset('assets/images/Artboard1.png') }}">
    <meta name="twitter:site" content="@alnadwaarchitects">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/Artboard1.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/images/Artboard1.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/Artboard1.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/images/Artboard1.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/Artboard1.png') }}">

    <!-- Canonical Link -->
    <link rel="canonical" href="https://alnadwaarchitects.com">

    <!-- Robots Meta -->
    <meta name="robots" content="index, follow">

    <!-- Schema.org Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Al Nadwa Architects",
        "url": "https://alnadwaarchitects.com",
        "logo": "{{ asset('assets/images/Artboard1.png') }}",
        "description": "Innovating Architecture and Engineering Solutions.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "123 Al Nadwa Street",
            "addressLocality": "Amman",
            "addressRegion": "Amman Governorate",
            "postalCode": "11118",
            "addressCountry": "Jordan"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+962123456789",
            "contactType": "Customer Service"
        },
        "sameAs": [
            "https://www.instagram.com/alnadwa.architecture/",
            "https://www.facebook.com/Al.NadwaArchitects/"
        ]
    }
    </script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/animated-text.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/theme-default.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('venobox/venobox.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" type="text/css" media="all">

    <!-- Modernizr JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
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
