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
							<li><a href="{{url('/')}}">Home</a></li>
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
				<!-- Services -->
				@php $number = 0; @endphp
				 @foreach ($services as $service)
				 @php $number++; @endphp
				 <div class="col-lg-4 col-md-6">
					 <div class="single-inner-service-box wow 
					 @if ($number%3 == 1)
					 fadeInLeft
					 @elseif ($number%3 == 2)
					 fadeInUp
					 @else
					 fadeInRight
					 @endif
					 ">
						 <div class="inner-service-tmb">
							 <img src="{{ asset('storage/'.$service->image_path) }}" alt="Architecture Design Icon">
						 </div>
						 <div class="inner-service-title">
							 <h3>{{$service->title}}</h3>
							 <p>{{$service->description}}</p>
						 </div>
	 
						 <div class="inner-service-number">
							 <h1>{{$number}}</h1>
						 </div>
					 </div>
				 </div>
				 @endforeach

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