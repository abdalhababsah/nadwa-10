<div id="sticky-header" class="hendre_nav_manu two">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="logo">
                    <a class="logo_img" href="index.html" title="hendre">
                        <img src="{{asset('assets/images/Artboard1.png')}}" alt="logo" height="60px">
                    </a>
                    <a class="main_sticky" href="index.html" title="hendre">
                        <img src="{{asset('assets/images/Artboard1.png')}}" alt="logo" height="60px">
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <nav class="hendre_menu">
                    <ul class="nav_scroll">
                        <li><a href="{{route('home')}}">Home </a></li>
                        <li><a href="{{route('services')}}">Services</a></li>
                        <li><a href="{{('')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header-src-box">
                    <div class="sidebar-btn style_two">
                        <div class="nav-btn navSidebar-button style_two"><span><i class="bi bi-filter-left"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Mobile Menu Area -->
<div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none ">
    <div class="mobile-menu">
        <nav class="hendre_menu">
            <ul class="nav_scroll">
                <li><a href="{{route('home')}}">Home </a></li>
                <li><a href="{{route('services')}}">Services</a>
                </li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="xs-sidebar-group info-group">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">
                    <i class="far fa-times-circle"></i>
                </a>
            </div>
            <div class="sidebar-textwidget">
                <!-- Sidebar Info Content -->
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="nav-logo">
                            <a href="{{route('home')}}"><img src="" alt="sid img" ></a>
                        </div>
                        <div class="row padding-two">
                            <div class="col-lg-6">
                                <div class="content-thumb-box">
                                    <img src="assets/images/resource/insta-4.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="content-thumb-box">
                                    <img src="assets/images/resource/insta-5.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="content-thumb-box">
                                    <img src="assets/images/resource/insta-2.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="content-thumb-box">
                                    <img src="assets/images/resource/insta-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="contact-info">
                            <h2>Contact Info</h2>
                            <ul class="list-style-one">
                                <li><i class="bi bi-envelope"></i>Chicago 12, Melborne City, USA</li>
                                <li><i class="bi bi-envelope"></i>(+001) 123-456-7890</li>
                                <li><i class="bi bi-envelope"></i>Example.com</li>
                                <li><i class="bi bi-envelope"></i>Week Days: 09.00 to 18.00 Sunday: Closed</li>
                            </ul>
                        </div>
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li class="facebook"><a href="#" class="fab fa-facebook-f"></a></li>
                            <li class="twitter"><a href="#" class="fab fa-instagram"></a></li>
                            <li class="linkedin"><a href="#" class="fab fa-twitter"></a></li>
                            <li class="instagram"><a href="#" class="fab fa-pinterest-p"></a></li>
                            <li class="youtube"><a href="#" class="fab fa-linkedin-in"></a></li>
                        </ul>
                    </div>
                </div>		
            </div>
        </div>
    </div>
</div>