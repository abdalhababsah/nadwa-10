@extends('layout.mainlayout')
@section('content')
	<!--==================================================-->
	<!-- Start breadcumb-area -->
	<!--==================================================-->

	<div class="breadcumb-area d-flex align-items-center" style="background-image: url({{ asset('storage/' . $work->image_path) }})">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcumb-content">
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li>{{$work->category}} Project Details</li>
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
	<!-- Start service-details-area -->
	<!--==================================================-->

	<div class="service-details-area">
		<div class="container">
			<div class="row">
				<div class="owl-carousel details_list">
					@isset($work->images)
					@foreach ($work->images as $image)
					<div class="col-lg-12">
						<div class="service-details-box">
							<div class="service-details-thumb">
								<img src="{{ asset('storage/' . $image->image) }}">
							</div>
						</div>
					</div>
					@endforeach
					@endisset
				</div>
			</div>
			<div class="row mg-tp">
				<div class="col-lg-12">
					<div class="service_details_box">
						<div class="service_details_content">
							<h3>Project Title</h3>
							<p>{{$work->title}}</p>
						</div>
						<div class="service-steps-list">
							<h3>Category</h3>
							<p class="text-light-emphasis">{{$work->category->name}}</p>
						</div>
					</div>
				</div>
                <hr>
				<div class="service-details-description text-dark">
                    <h3>More Information</h3>
					<p>
						{!! nl2br($work->description) ?? '-'!!}
					</p>
				</div>
			</div>
		</div>
	</div>

	<!--==================================================-->
	<!-- End service-details-area -->
	<!--==================================================-->



	@endsection
