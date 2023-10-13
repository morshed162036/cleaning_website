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
					<li>Order Form</li>
				</ul>
			</div>
		</div>
		<!-- //Breadcrumbs Block -->
		<div class="block">
			<h2 class="text-center h-lg h-decor">Order Form</h2>
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="order-form-box">
							<form method="post" action="{{ route('order-page.store') }}" novalidate="novalidate"> @csrf
								<h3>Book your cleaning service in 60 seconds</h3>
								<div class="divider-line"></div>
								<h6>Contact Information</h6>
								<p>This information will be used to contact you about your service.</p>
								<div class="row">
									<div class="col-sm-6">
										<input type="text" class="input-custom input-custom--sm input-full" name="name"
											placeholder="Your name*" required>
									</div>
									<div class="col-sm-6">
										<input type="text" class="input-custom input-custom--sm input-full"
											name="address" placeholder="Your address*" required>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<input type="text" class="input-custom input-custom--sm input-full" name="phone"
											placeholder="Phone number*" required>
									</div>
									<div class="col-sm-6">
										<input type="text" class="input-custom input-custom--sm input-full" name="email"
											placeholder="E-mail">
									</div>
								</div>
								<div class="divider-line"></div>
								<h6>Home Information</h6>
								<p>Tell us about your home</p>
								<div class="row">
									<div class="form-floating">
										<textarea class="form-control" id="floatingTextarea2" name="description"
											style="height: 100px"></textarea>
									</div>
								</div>
								<div class="divider-line"></div>
								<h6>Service Requested</h6>
								<div class="select-wrapper select-wrapper--sm">
									<select name="service_id" class="input-custom input-custom--sm" required>
										<option value="" disabled selected>- Please Select -</option>
										@if ($services)
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                            @endforeach
                                        @endif
                                        
									</select>
								</div>
								<h6>Price Plan Requested</h6>
								<div class="select-wrapper select-wrapper--sm">
									<select name="plan_id" class="input-custom input-custom--sm">
										<option value="" disabled selected>- Please Select -</option>
										@if ($plans)
                                            @foreach ($plans as $plan)
                                                <option value="{{ $plan->id }}">{{ $plan->title }}</option>
                                            @endforeach
                                        @endif
                                        
									</select>
								</div>
								<div class="divider-line"></div>
								<h6>Service Requested</h6>
								<p>When would you like us to come? </p>
								<div class="row">
									<div class="col-sm-4 col-md-5">
										<div class="">
											<input type="date" name="date" class="form-control input-custom input-custom--sm"
												placeholder="">
										</div>
									</div>
									<div class="visible-xs text-center">
										<p>Any time between</p>
									</div>
									<div class="col-sm-8 col-md-7 text-right text-center-xs">
										<span class="hidden-xs">Any time between &nbsp;</span>
										<div class="select-wrapper select-wrapper--sm select-time">
                                            <input type="time" class="input-custom input-custom--sm" name="start_time">
										</div>
										<span>&nbsp;-&nbsp;</span>
										<div class="select-wrapper select-wrapper--sm select-time">
                                            <input type="time" class="input-custom input-custom--sm" name="end_time">
										</div>
									</div>
								</div>
								<div class="divider"></div>
								<div class="divider-line"></div>
								<div class="divider"></div>

								<br>
								<p class="text-center">We will confirm your service request within 24 hours. Thank you
									very much!</p>
								<div class="text-center">
									<button type="submit" class="btn btn-wide">BOOK NOW</button>
								</div>
								<div class="divider"></div>
								<div class="successform text-center">
									<div class="divider-line"></div>
									<p>Your message was sent successfully!</p>
									<div class="divider"></div>
								</div>
								<div class="errorform text-center">
									<div class="divider-line"></div>
									<p>Something went wrong, try refreshing and submitting the form again.</p>
									<div class="divider"></div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-4 visible-lg">
						<img src="{{ asset('services/images/content/order-form-img.jpg') }}" class="img-fullwidth" alt="">
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