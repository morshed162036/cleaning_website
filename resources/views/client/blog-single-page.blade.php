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
					<li><a href="{{ route('blog-page.index') }}">Blog</a></li>
					<li>Hiring A Great Housekeeper</li>
				</ul>
			</div>
		</div>
		<!-- //Breadcrumbs Block -->
		<div class="block">
			<h2 class="text-center h-lg h-decor">Blog Posts</h2>
			<div class="container">
				<div class="row">
					<div class="col-md-9 aside">
                        @if ($blog)
                                <div class="blog-post">
                                    <div class="post-image">
                                        <a href="{{ route('blog-page.show',$blog->id) }}"><img src="{{ asset('images/blog/'.$blog->image) }}" alt=""></a>
                                    </div>

                                    <h2 class="post-title">{{ $blog->title }}</h2>
                                    <h6 class="btn">{{ $blog->category->title }}  </h6>
                                    <div class="post-teaser">
                                        {!! $blog->post !!}
                                    </div>
                                    {{-- <div class="post-read-more"><a href="{{ route('blog-page.show',$blog->id) }}" class="btn">Read Post</a></div> --}}
                                </div>
                        @endif
						
						{{-- <div class="clearfix"></div>
						<div class="text-center">
							<ul class="pagination">
								{{ $blogs->links() }}
							</ul>
						</div> --}}
					</div>
					<div class="col-md-3 aside">

						<div class="side-block">
							<h4>Post Categories</h4>
							<ul class="category-list">
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <li><a href="">{{ $category->title }}</a></li>
                                    @endforeach
                                @endif
								
							</ul>
						</div>

						{{-- <div class="side-block">
							<h4>Gallery Categories</h4>
							<ul class="category-list">
								<li><a href="#">Carpet Cleaning <span>(2)</span></a></li>
								<li><a href="#">After Renovation <span>(7)</span></a></li>
								<li><a href="#">House Cleaning <span>(3)</span></a></li>
								<li><a href="#">Window Cleaning <span>(1)</span></a></li>
								<li><a href="#">Floor Cleaning <span>(1)</span></a></li>
								<li><a href="#">Bathroom cleaning <span>(5)</span></a></li>
								<li><a href="#">Kitchen cleaning <span>(1)</span></a></li>
								<li><a href="#">Upholstery cleaning <span>(3)</span></a></li>
								<li><a href="#">Appliance cleaning <span>(1)</span></a></li>
							</ul>
						</div> --}}
						<div class="side-block">
							<h4>Services Categories</h4>
							<ul class="category-list">
                                @if ($services)
                                    @foreach ($services as $service)
                                        <li><a href="@if ($service->service_details)
                                            {{ route('service-page.show',$service->service_details->id) }}
                                        
                                        @endif">{{ $service->title }}</a></li>
                                    @endforeach
                                @endif
							</ul>
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