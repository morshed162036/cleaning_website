@extends('client.layout.main')

@section('css')
    <!-- Vendors -->
	<link href="{{ asset('services/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/slick.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/lightbox.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/bootstrap-datetimepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/nouislider.css') }}" rel="stylesheet">
    <link href="{{ asset('services/css/vendor/nouislider.css') }}" rel="stylesheet">
	<link href="{{ asset('services/css/vendor/twentytwenty.css') }}" rel="stylesheet">
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
					<li><a href="index.html">Home</a></li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
		<!-- //Breadcrumbs Block -->
		<!--Gallery block-->
		<div class="block">
			<div class="container">
				<h2 class="text-center h-lg h-decor">Cleaning Gallery</h2>
				<div class="text-center max-800">
					<p class="p-lg">In our gallery, you can find images showing the amazing results of our cleaning
						methods for carpet cleaning, upholstery cleaning, mattress cleaning, stone floor cleaning and
						much more.</p>
				</div>
				<div class="filters-by-category text-center">
					<ul class="option-set justify-content-center" data-option-key="filter">
						<li><a href="#filter" data-option-value="*" class="selected">All</a></li>
                        @foreach ($services as $service)
                            <li><a href="#filter" data-option-value=".{{ $service->id }}">{{ $service->title }}</a></li>
                        @endforeach
					</ul>
				</div>
				<div class="gallery-wrap">
					<div class="loading-content">
						<div class="inner-circles-loader"></div>
					</div>
					<div class="gallery-cleaning gallery-isotope" id="gallery">
                        @foreach ($galleries as $gallery)
                            <div class="gallery-item {{ $gallery->service_id }}">
                                <div class="twentytwenty-container">
                                    <img src="{{ asset('images/gallery/'.$gallery->before) }}" alt="" />
                                    <img src="{{ asset('images/gallery/'.$gallery->after) }}" alt="" />
                                </div>
                            </div>
                        @endforeach
					</div>
				</div>
				<div class="text-center mb-4">
                    {{ $galleries->links() }}
                </div>
                
			</div>
		</div>
		<!--/Gallery block-->
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
    <script src="{{ asset('services/js/vendor/twentytwenty/jquery.event.move.js') }}"></script>
	<script src="{{ asset('services/js/vendor/twentytwenty/jquery.twentytwenty.js') }}"></script>
	<!-- Custom JavaScripts -->
	<script src="{{ asset('services/js/custom.js') }}"></script>
	<script src="{{ asset('services/js/forms.js') }}"></script>
@endsection