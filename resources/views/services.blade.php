@extends('layout.mainlayout')
@section('content')
	<!--==================================================-->
	<!-- Start breadcumb-area -->
	<!--==================================================-->

	<div class="breadcumb-area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcumb-content">
						<h1>Services</h1>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>Services </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--==================================================-->
	<!-- End breadcumb-area -->
	<!--==================================================-->





	<!--==================================================-->
	<!-- Start service-area-inner-page -->
	<!--==================================================-->

	<div class="service-area-inner-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title upper">
						<div class="main-title">
							<h1>Services</h1>
						</div>
						<div class="sub-title">
							<h2>Featured <span>Services</span></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row mg-tp">
				<!-- Service 1: Architecture Design -->
				<div class="col-lg-4 col-md-6">
					<div class="single-inner-service-box wow fadeInLeft">
						<div class="inner-service-tmb">
							<img src="{{ asset('assets/images/service/inner-icon-1.png') }}" alt="Architecture Design Icon">
						</div>
						<div class="inner-service-title">
							<h3>Architecture Design</h3>
							<p>Creating innovative and sustainable structures tailored to client needs, seamlessly blending functionality with aesthetic appeal.</p>
						</div>
	
						<div class="inner-service-number">
							<h1>01</h1>
						</div>
					</div>
				</div>
				<!-- Service 2: 3D Modelling Design -->
				<div class="col-lg-4 col-md-6">
					<div class="single-inner-service-box wow fadeInUp">
						<div class="inner-service-tmb">
							<img src="{{ asset('assets/images/service/inner-icon-2.png') }}" alt="3D Modelling Design Icon">
						</div>
						<div class="inner-service-title">
							<h3>3D Modelling Design</h3>
							<p>Bringing ideas to life with detailed and realistic 3D models, ensuring precise visualization and effective planning.</p>
						</div>
	
						<div class="inner-service-number">
							<h1>02</h1>
						</div>
					</div>
				</div>
				<!-- Service 3: Blueprint Design -->
				<div class="col-lg-4 col-md-6">
					<div class="single-inner-service-box wow fadeInRight">
						<div class="inner-service-tmb">
							<img src="{{ asset('assets/images/service/inner-icon-3.png') }}" alt="Blueprint Design Icon">
						</div>
						<div class="inner-service-title">
							<h3>Blueprint Design</h3>
							<p>Providing comprehensive architectural plans that ensure accurate construction and facilitate seamless project execution.</p>
						</div>
	
						<div class="inner-service-number">
							<h1>03</h1>
						</div>
					</div>
				</div>
				<!-- Service 4: Industrial Design -->
				<div class="col-lg-4 col-md-6">
					<div class="single-inner-service-box wow fadeInLeft">
						<div class="inner-service-tmb">
							<img src="{{ asset('assets/images/service/inner-icon-4.png') }}" alt="Industrial Design Icon">
						</div>
						<div class="inner-service-title">
							<h3>Industrial Design</h3>
							<p>Developing functional and stylish products that meet market demands and significantly enhance user experiences.</p>
						</div>
	
						<div class="inner-service-number">
							<h1>04</h1>
						</div>
					</div>
				</div>
				<!-- Service 5: Interior Design -->
				<div class="col-lg-4 col-md-6">
					<div class="single-inner-service-box wow fadeInUp">
						<div class="inner-service-tmb">
							<img src="{{ asset('assets/images/service/inner-icon-5.png') }}" alt="Interior Design Icon">
						</div>
						<div class="inner-service-title">
							<h3>Interior Design</h3>
							<p>Transforming spaces into harmonious environments with optimized layouts and beautifully styled furnishings.</p>
						</div>
	
						<div class="inner-service-number">
							<h1>05</h1>
						</div>
					</div>
				</div>
				<!-- Service 6: Furniture Design -->
				<div class="col-lg-4 col-md-6">
					<div class="single-inner-service-box wow fadeInRight">
						<div class="inner-service-tmb">
							<img src="{{ asset('assets/images/service/inner-icon-6.png') }}" alt="Furniture Design Icon">
						</div>
						<div class="inner-service-title">
							<h3>Furniture Design</h3>
							<p>Crafting custom furniture pieces that seamlessly combine form and function to enhance any space.</p>
						</div>
	
						<div class="inner-service-number">
							<h1>06</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--==================================================-->
	<!-- End service-area-inner-page -->
	<!--==================================================-->


	<!--==================================================-->
	<!-- Start arcke-agency-area -->
	<!--==================================================-->

	<div class="arcke-agency-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="arcke-agency">
						<h2>Start Your Dream <span>Projects</span> <br> with Al Nadwa’s Agency</h2>
					</div>
					<div class="arcke-agency-button">
						<a href="#">Contact Us</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--==================================================-->
	<!-- End arcke-agency-area -->
	<!--==================================================-->
	@endsection