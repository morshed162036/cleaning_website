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
					<li>Contact Us</li>
				</ul>
			</div>
		</div>
		<!-- //Breadcrumbs Block -->
		<h1 class="text-center h-decor">Contact Us</h1>
		<div class="block fullwidth no-pad">
			
            <iframe src="{{ $details->google_location }}" width="1900" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			
		</div>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h2>General Office</h2>
						<div class="contact-info-sm">
							<h5>Address</h5>
							<i class="icon icon-map-marker"></i>{{ $details->address }}
						</div>
						<div class="contact-info-sm">
							<h5>Phone 24/7</h5>
							<i class="icon icon-technology"></i>{{ $details->phone }} @if ($details->fax)
							<span class="text-nowrap footer_text">, Fax: {{ $details->fax }}</span>
						@endif
						</div>
						<div class="contact-info-sm">
							<h5>Operating Hours</h5>
							<i class="icon icon-clock"></i>{{ $details->operation_hour_1 }}
                            <br> @if ($details->operation_hour_2)
                            {{ $details->operation_hour_2 }}
                            @endif
						</div>
					</div>
					<div class="divider visible-sm visible-xs"></div>
					<div class="col-md-8">
						<h2 class="text-center h-lg h-decor">Get in Touch</h2>
						<form class="contact-form" action="{{ route('client.contact-page-store') }}" method="post" novalidate="novalidate"> @csrf
							@if(Session::has('success'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Success: </strong>{{ Session::get('success') }}
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
							@else
								<div class="errorform text-center">
									<p>Something went wrong, try refreshing and submitting the form again.</p>
								</div>
							@endif
							
							
							<div class="input-wrapper">
								<input type="text" class="input-custom input-full" name="name" placeholder="Your name*">
							</div>
							<div class="input-wrapper">
								<input type="text" class="input-custom input-full" name="phone"
									placeholder="Your number*">
							</div>
							<div class="input-wrapper">
								<input type="text" class="input-custom input-full" name="email" placeholder="Email*">
							</div>
							<div class="input-wrapper">
								<textarea class="textarea-custom input-full" name="message"
									placeholder="Message"></textarea>
							</div>
							<!-- <div class="g-recaptcha text-center" data-sitekey="YOUR SITE KEY" style="display: inline-block;"></div>
						<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha"> -->
							<br>
							<button type="submit" class="btn">Send Message</button>
						</form>
					</div>
				</div>
			</div>
		</div>
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