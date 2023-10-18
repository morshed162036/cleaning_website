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
					<li><a href="{{ route('service-page.index') }}">Our Services</a></li>
					<li>Service Details</li>
				</ul>
			</div>
		</div>
		<!-- //Breadcrumbs Block -->
		<div class="block">
			<h1 class="text-center h-decor">Our Services</h1>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-lg-9 aside">
						<img src="{{ asset('images/service/'.$details->image) }}" class="img-responsive" alt="">
						<div class="divider-md"></div>
						<h3>{{ $details->service->title }}</h3>
						{!! $details->description !!}
						<div class="divider-xl"></div>
						<div class="contact-box">
							<div class="contact-info-wrap">
								<div class="contact-info">
									<i class="icon icon-technology"></i>Phone: {{ $company->phone }}
									@if ($company->fax)
										<br>Fax: {{ $company->fax }}
									@endif 
								</div>
								<div class="contact-info">
									<i class="icon icon-clock"></i>{{ $company->operation_hour_1 }}
									<br> @if ($company->operation_hour_2)
									{{ $company->operation_hour_2 }}
									@endif
								</div>
							</div>
							<a href="{{ route('order-page.index') }}" class="btn"><i class="icon icon-bell"></i>Book now</a>
						</div>
						<div class="divider-xl"></div>
						<div class="contact-box">
							<div class="card block-bg-light-grey">
								<div class="card-title">
									<h4>Our Promise</h4>
								</div>
								<div class="card-body">
									{!! $details->our_plan !!}
								</div>
							</div>

						</div>
					</div>
					<div class="col-md-4 col-lg-3 aside">
						<ul class="services-list">
							@foreach ($services as $service)
                                    
                                <li @if ($details->service->id == $service->id)
                                    class="active"
                                @endif><a href="@if ($service->service_details)
                                    {{ route('service-page.show',$service->service_details->id) }}
                               
                                @endif">{{ $service->title }}</a></li>
                                @endforeach
						</ul>
						<div class="question-box">
							<div class="question-box-title text-center">Have a Question?</div>
							<form class="question-form" action="{{ route('client.contact-page-store') }}" method="post"> @csrf
								
								<input type="text" name="name" class="form-control" value="" placeholder="Your name*">
								<input type="text" name="phone" class="form-control" value="" placeholder="Your number*">
								<input type="text" name="email" class="form-control" value="" placeholder="E-mail">
								<textarea name="message" class="form-control" placeholder="Message"></textarea>
								<div class="clearfix text-center">
									<button type="submit" class="btn btn-full btn-white">Send Question</button>
								</div>
							</form>
						</div>
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