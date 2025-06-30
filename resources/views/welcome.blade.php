@extends('layout.mainlayout')
@section('content')
<div class="hero-slides owl-carousel owl-loaded owl-drag" loading="lazy">
    @php
        $slides = [
            '6.webp',
            '2.webp',
            '3.webp',
            '4.webp',
            '5.webp',
        ];
    @endphp
    @foreach($slides as $slide)
        <div class="slider-area one left-sidebar"
            style="background-image:url({{ asset("assets/images/slider/$slide") }});">
            <img src="{{ asset("assets/images/slider/$slide") }}" alt="Slide" loading="lazy" style="display:none;">
        </div>
    @endforeach
</div>

<!--==================================================-->
<!-- End slider-area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start tag-area -->
<!--==================================================-->

<div class="tag-area one upper">
    <div class="container-fluid">
        <div class="marquee">
            <div class="marquee-block">
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span>. INTERIOR DESIGN.</span></h6>
                </div>
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span>. CONSTRUCTION .</span></h6>
                </div>
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span> . FURNITURES . </span></h6>
                </div>
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span>. LUXURY HOME . </span></h6>
                </div>
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span>. ARCHITECTURE . </span></h6>
                </div>
                <div class="content-box">
                    <h6 class="title"><span>. BUILDING . </span></h6>
                </div>
                <div class="content-box">
                    <h6 class="title"><span> . INTERIOR DESIGN. </span></h6>
                </div>
                <div class="content-box">
                    <h6 class="title"><span>. CONSTRUCTION .</span></h6>
                </div>
                <div class="content-box">
                    <h6 class="title"><span>. LUXURY HOME . </span></h6>
                </div>
            </div>
            <div class="marquee-block">
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span>. INTERIOR DESIGN.</span></h6>
                </div>
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span>. CONSTRUCTION .</span></h6>
                </div>
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span> . FURNITURES . </span></h6>
                </div>
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span>. LUXURY HOME . </span>&gt;</h6>
                </div>
                <!-- content-box -->
                <div class="content-box">
                    <h6 class="title"><span>. ARCHITECTURE . </span></h6>
                </div>
                <div class="content-box">
                    <h6 class="title"><span>. BUILDING . </span></h6>
                </div>
                <div class="content-box">
                    <h6 class="title"><span> . INTERIOR DESIGN. </span></h6>
                </div>
                <div class="content-box">
                    <h6 class="title"><span>. CONSTRUCTION .</span></h6>
                </div>
                <div class="content-box">
                    <h6 class="title"><span>. LUXURY HOME . </span></h6>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==================================================-->
<!-- End tag-area -->
<!--==================================================-->



<!--==================================================-->
<!-- Start about-area -->
<!--==================================================-->

<div class="about-area one upper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title upper">
                    <div class="main-title">
                        <h1>About Us</h1>
                    </div>
                    <div class="sub-title">
                        <h2>Discover Al Nadwa <span>Story</span></h2>
                    </div>
                </div>
                <div class="about-shape dance">
                    <img src="assets/images/resource/border.png" alt="">
                </div>
                <div class="abouts-shapes bounce-animate2">
                    <img src="assets/images/resource/counter-shape.png" alt="">
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="single-about-left wow fadeInLeft">
                    <div class="about-thumb">
                        <img src="{{asset('assets/images/story.webp')}}" width="800" height="600" class="img-fluid" alt="interior shot" loading="lazy">
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-about-right wow fadeInRight">
                    <div class="appoinment-tab">
                        <!-- / tab -->
                        <div class="tab">
                            <!-- / tabs -->
                            <ul class="tabs">
                                <li class="boder"><a href="#">MISSION</a></li>
                            </ul>
                            <div class="tab_content">
                                <!-- / tabs_item -->
                                <div class="tabs_item">
                                    <!-- post comment -->
                                    <div class="post-comment-description">

                                        <p>
                                            Deliver exceptional architectural solutions that prioritize
                                            functionality, history, heritage and

                                            aesthetics across various project types, from luxurious villas to large
                                            scale industrial facilities, ensuring

                                            quality and innovation in every project.</p>
                                    </div>
                                    <div class="tab-thumb">
                                        <img src="{{asset('')}}" alt="">
                                    </div>
                                    <div class="tab-title">
                                        <h3>Design Make Dream</h3>
                                        <p>
                                            Architectural and interior design consulting office.
                                        </p>
                                        <p>
                                            Was founded in 1992 by architect Nadia al-Hakim.
                                        </p>
                                    </div>

                                </div>

                            </div> <!-- / tab_content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==================================================-->
<!-- End about-area -->
<!--==================================================-->


<!--==================================================-->
<!-- Start counter area -->
<!--==================================================-->

<div class="counter-area one upper">
    <div class="container">
        <div class="row bg-col align-items-center">
            <div class="col-lg-3 col-md-6">
                <div class="counter-single-item-inner wow fadeInUp">
                    <div class="counter-content">
                        <div class="counter-text">
                            <h1><span class="counter">120</span>+</h1>
                            <span></span>
                            <div class="counter-title">
                                <h4>ALL WORKS</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-single-item-inner upper">
                    <div class="counter-content">
                        <div class="counter-text">
                            <h1><span class="counter">70</span></h1>
                            <span></span>
                            <div class="counter-title">
                                <h4>ENGINEERS</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-single-item-inner wow fadeInUp">
                    <div class="counter-content">
                        <div class="counter-text">
                            <h1><span class="counter">105</span>K</h1>
                            <span></span>
                            <div class="counter-title">
                                <h4>CUSTOMERS</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-single-item-inner upper">
                    <div class="counter-content">
                        <div class="counter-text">
                            <h1><span class="counter">50</span>+</h1>
                            <span></span>
                            <div class="counter-title">
                                <h4>AWARDS WIN</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="conun-shap bounce-animate3">
                <img src="assets/images/resource/counter-shape.png" alt="">
            </div>
            <div class="conunt-shape bounce-animate2">
                <img src="assets/images/resource/counter-shap.png" alt="">
            </div>
        </div>
    </div>
</div>

<!--==================================================-->
<!-- End counter area -->
<!--==================================================-->


<!--==================================================-->
<!-- Start testimonial-area -->
<!--==================================================-->

<div class="testimonial-area one upper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <div class="single-testimonial-box">
                    <div class="section-title upper">
                        <div class="main-title">
                            <h1>REVIEWS</h1>
                        </div>
                        <div class="sub-title">
                            <h2>Customer’s <span>Feedback</span></h2>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="row">

                            <div class="owl-carousel testi-list">
                                @isset($testemonials)
                                    @foreach ($testemonials as $testemonial)
                                        <div class="col-lg-12">
                                            <div class="test-box">
                                                <div class="testimonial-description">
                                                    <p>{!! $testemonial->body !!}</p>
                                                </div>
                                                <div class="testimonial-tmb">
                                                    <img src="@isset($testemonial->image)
                                                    {{ asset('storage/' . $testemonial->image) }}
                                                    @else
                                                    {{ asset('assets/images/default.jpg') }}
                                                    @endisset " alt="{{ $testemonial->name }}">
                                                </div>
                                                <div class="testimonial-title">
                                                    <h3>{{ $testemonial->name }}</h3>
                                                    <span>{{ $testemonial->position }}</span>
                                                </div>
                                                <div class="testimonial-icon">
                                                    <img src="assets/images/testimonial/quote.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-lg-12">
                                        <div class="test-box">
                                            <div class="testimonial-description">
                                                <p>“Appropriately target distributed e-services after multimediae based
                                                    vortals. Competently leverage other's client-centric but initiatives
                                                    without timely portals. Collaboratively harness backward-compatible
                                                    building”</p>
                                            </div>
                                            <div class="testimonial-tmb">
                                                <img src="assets/images/testimonial/test-1.png" alt="">
                                            </div>
                                            <div class="testimonial-title">
                                                <h3>John D. Alexon</h3>
                                                <span>CEO & Founder</span>
                                            </div>
                                            <div class="testimonial-icon">
                                                <img src="assets/images/testimonial/quote.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="test-box">
                                            <div class="testimonial-description">
                                                <p>“Appropriately target distributed e-services after multimediae based
                                                    vortals. Competently leverage other's client-centric but initiatives
                                                    without timely portals. Collaboratively harness backward-compatible
                                                    building”</p>
                                            </div>
                                            <div class="testimonial-tmb">
                                                <img src="assets/images/testimonial/test-1.png" alt="">
                                            </div>
                                            <div class="testimonial-title">
                                                <h3>John D. Alexon</h3>
                                                <span>CEO & Founder</span>
                                            </div>
                                            <div class="testimonial-icon">
                                                <img src="assets/images/testimonial/quote.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testi-shape bounce-animate3">
            <img src="assets/images/resource/border.png" alt="">
        </div>
    </div>
</div>

<!--==================================================-->
<!-- end testimonial-area -->
<!--==================================================-->
@endsection
