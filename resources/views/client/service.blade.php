@extends('client.layout.main')

@section('css')
    <!-- Vendors -->
	<link href="{{ asset('services/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/slick.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/lightbox.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/bootstrap-datetimepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/nouislider.css') }}" rel="stylesheet">
	<!-- Template Style -->
	<link href="{{ asset('services/css/custom.css') }}" rel="stylesheet">
	<!-- Icon Font-->
	<link href="{{ asset('services/fonts/icomoon/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Breadcrumbs Block -->
		<div class="block breadcrumbs">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="{{ route('client.home') }}">Home</a></li>
					<li>Services</li>
				</ul>
			</div>
		</div>
		<!-- //Breadcrumbs Block -->
		<!-- Services block -->
		<div class="block">
			<div class="container">
				<h2 class="text-center h-lg h-decor">Our Services</h2>
				<div class="text-center max-800">
					<p class="p-lg">At Cleaning Company Team, our highly trained, experienced, and skilled cleaning
						specialists offer thorough and organized cleaning services for clients across Bangladesh.</p>
				</div>

				<div class="row services-grid services-mobile-carousel mx-3">
					@if ($services)
						@foreach ($services as $service)
							<div class="col-xs-4 col-sm-4 col-md-4 service-box">
								<div class="blog-post bg-info">
									<div class="post-image">
										<a href="@if ($service->service_details)
											{{ route('service-page.show',$service->service_details->id) }}
										@else
											'#'
										@endif"></a><img src="{{ asset('images/service/'.$service->image) }}" alt="">
									</div>
									<h4 class="service-box-title">{{ $service->title }}</h4>
									<div class="service-box-text" style=" height: 100px; overflow: hidden;">
										@if ($service->service_details)
											{!! $service->service_details->description !!}
										@endif
										
									</div>
									<a href="@if ($service->service_details)
										{{ route('service-page.show',$service->service_details->id) }}
									@else
										'#'
									@endif" class="service-box-more">view Details
										<i class="icon-play"></i>
									</a>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
		<!-- /Services block -->
@endsection

@section('js')
    <!-- External JavaScripts -->
	<script src="{{ asset('services/js/vendor/jquery.js') }}"></script>
	<script src="{{ asset('services/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/slick.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/lightbox.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.scroll-with-ease.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.form.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/moment.js') }}"></script>
	<script src="{{ asset('services/js/vendor/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.countTo.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.print.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.dotdotdot.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.doubletaptogo.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/nouislider.min.js') }}"></script>
	<script src="{{ asset('services/js/vendor/jquery.elevateZoom-3.0.8.min.js') }}"></script>
	<!-- Custom JavaScripts -->
	<script src="{{ asset('services/js/custom.js') }}"></script>
	<script src="{{ asset('services/js/forms.js') }}"></script>
@endsection