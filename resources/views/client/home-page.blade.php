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
            
    <!-- Slider -->
    @if ($banners)
        <div class="block">
            <div id="mainSliderWrapper">
                <div class="loading-content">
                    <div class="loading-dots dark-gray">
                        <i></i>
                        <i></i>
                        <i></i>
                        <i></i>
                    </div>
                </div>

                <div id="mainSlider">
                    @foreach ($banners as $banner)
                        <div class="slide mask">
                        
                            <div class="img--holder" style="background-image: url('images/banner/{{ $banner->image }}');">
                            </div>
                            <div class="slide-content center">
                                <div class="vert-wrap container">
                                    <div class="vert">
                                        <div class="container">
                                            <h2 data-animation="zoomIn" data-animation-delay="2s">{{ $banner->first_text }}</h2>
                                            <h3 data-animation="zoomIn" data-animation-delay="3s">{{ $banner->second_text }}</h3>
                                            <a href="{{ route('order-page.index') }}" class="btn" data-animation="fadeInUp"
                                                data-animation-delay="4s">Free Estimate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                        
                    @endforeach
                </div>
            </div>
        </div>         
    @endif
    
    <!-- Slider -->

    <!-- services -->

    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center h-lg h-decor">Which Service Do You Need?</h2>
                    <div class="text-center max-700">
                        <p class="p-lg">We have top class experts regarding every services mentioned. Select form
                            our wide range of services below.</p>
                    </div>
                    <div class=" row">
                    @if ($services)
                        @foreach ($services as $service)
                            <div class="col-lg-4">
                                <div class="demo_box shadow p-3 mb-5 bg-body-tertiary rounded">
                                    <div class="news-prw-image demo">
                                        <a href="blog-post-page.html">
                                            <img src="{{ asset('images/service/'.$service->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="demo_write">
                                        <h3>{{ $service->title }}</h3>
                                        <a href="@if ($service->service_details)
                                            {{ route('service-page.show',$service->service_details->id) }}
                                        @else
                                            '#'
                                        @endif" class="btn btn-default"> View details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                        
                    </div>
                    @if ($service_count > 6)
                        <div class="services_btn text-center mt-4">
                            <a href="{{ route('service-page.index') }}" class="btn btn-default">See More</a>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- About Us block -->
    <div class="block fullwidth-bg bg-cover inset-lg-3 pb-xs-0 block-1" data-bg="{{ asset('services/images/block-bg-1.jpg') }}">
        <div class="container">
            <div class="row zindex-1">
                <div class="col-sm-7 col-lg-9">
                    <h2 class="h-lg">A Little About Us !</h2>
                    @if ($abouts)
                            <ul class="nav nav-tabs nav-tabs--sm">
                                
                                    <li class="active" hidden><a data-toggle="tab" href="#all">Some Words</a></li>
                                @foreach ($abouts as $about)
                                    <li><a data-toggle="tab" href="#{{ $about->id }}">{{ $about->title }}</a></li>
                                @endforeach
                                
                                
                            </ul>
                            <div class="tab-content tab-content-nopad">
                                <div id="all" class="tab-pane fade in active">
                                    <p>Orignaly, We started providing cleaning & fumigation services. After becoming no.1 trusted company in the sector we realized that all other companies which are providing maintenance services donot have any direct employees. They are just playing role of a middle man .i.e. getting work and passing it to the vendors. This system cannot provide 100% satisfied results.</p>
                                    <br>
                                    <p>So, That is why we started our maintenance services, We have our own employed fully trained professionals for every service posted. Wether it would be electrician, plumber or carpenter, We have trained expert for it!</p>
                                </div>
                                @foreach ($abouts as $about)
                                    <div id="{{ $about->id }}" class="tab-pane fade in">
                                        {!! $about->description !!}
                                        <div class="divider-sm"></div>
                                    </div>
                                @endforeach
                            </div>
                    @endif
                    
                </div>
            </div>
            <div class="img-right-wrap">
                <img src="{{ asset('services/images/content/about_img.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- /About Us block -->
    <!-- Why choose us Block -->
    <div class="block">
        <div class="container">
            <div class="row row-revert-xs">
                <div class="col-sm-5 col-md-5 col-lg-6">
                    <img src="{{ asset('services/images/content/index-img-ac_repair.jpg') }}"
                        class="img-responsive visible-lg visible-md hidden-sm visible-xs" alt="">
                    <img src="{{ asset('services/images/content/index-img-ac_repair.jpg') }}"
                        class="img-responsive hidden-lg hidden-md hidden-xs visible-sm" alt="">
                </div>
                <div class="divider-xl visible-xs"></div>
                <div class="col-sm-7 col-md-7 col-lg-6">
                    <h2>Reasons to Choose Us</h2>
                    <p class="p-lg">Behind our commitment to excellence are few key attributes that define who we
                        are and what makes us different from any other.
                    </p>
                    <div class="marker-box">
                        <div class="marker-box-marker"><i class="icon-leaf"></i></div>
                        <h4 class="marker-box-title">Professionalism</h4>
                        <p> Our skilled technicians are trained to deliver top-tier services with utmost
                            professionalism.</p>
                    </div>
                    <div class="marker-box">
                        <div class="marker-box-marker"><i class="icon-leaf"></i></div>
                        <h4 class="marker-box-title">Reliability: </h4>
                        <p>We are committed to punctuality and reliability, ensuring your projects are completed on
                            time.</p>
                    </div>
                    <div class="marker-box hidden-md">
                        <div class="marker-box-marker"><i class="icon-leaf"></i></div>
                        <h4 class="marker-box-title">Customer-Centric</h4>
                        <p> Your satisfaction is our priority, and we tailor our services to meet your unique
                            requirements.</p>
                    </div>
                    <div class="marker-box hidden-md">
                        <div class="marker-box-marker"><i class="icon-leaf"></i></div>
                        <h4 class="marker-box-title">Competitive Pricing:</h4>
                        <p> We offer competitive pricing without compromising on the quality of service.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Why chose us block -->

    <!-- Prices block  -->
    <div class="block">
        <div class="container">
            <h2 class="text-center h-lg h-decor">Choose Your Pricing Plan</h2>
            <div class="text-center max-800">
                <p class="p-lg">After trading for a few years we have learnt that the one size does not fit all. We
                    try our best to tailor a package that meets your particular needs and stays within your budget.
                </p>
            </div>
            <div class="tab-content tab-content-nopad">
                <div id="plan1" class="tab-pane fade in active">
                    <div class="row price-row price-carousel-tab">
                        @if ($pricingplans)
                            @foreach ($pricingplans as $plan)
                                <div class="col-md-6 col-lg-4">
                                    <div class="prices-box">
                                        <h3 class="prices-box-title">{{ $plan->title }}</h3>
                                        <div class="prices-box-price">
                                            <b>{{ $plan->price }}<sup>&nbsp;&nbsp;Tk</sup></b>
                                            <!-- <sup>95</sup> -->
                                            <span>Per Hour</span>
                                        </div>
                                        {!! $plan->details !!}
                                        <div class="prices-box-link">
                                            <a href="{{ route('order-page.index') }}" class="btn">Order now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div id="plan2" class="tab-pane fade in">
                    <div class="row price-row price-carousel-tab">
                        <div class="col-md-6 col-lg-4">
                            <div class="prices-box">
                                <h3 class="prices-box-title">Start Plan</h3>
                                <div class="prices-box-price">
                                    <b><sup>&nbsp;&nbsp;$</sup>59<sup>95</sup></b>
                                    <span>Per Day</span>
                                </div>
                                <div class="prices-box-row"><span>Trained Cleaner</span></div>
                                <div class="prices-box-row"><span><b>Maintenance</b> Cleaning</span></div>
                                <div class="prices-box-row"><span>Liability Insurance</span></div>
                                <div class="prices-box-row"><span>Planned <b>Holiday</b> Cover</span></div>
                                <div class="prices-box-row"><span>Feedback Centre Access</span></div>
                                <div class="prices-box-link">
                                    <a href="order-form.html" class="btn">Order now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="prices-box prices-box--primary">
                                <h3 class="prices-box-title">Standard Plan</h3>
                                <div class="prices-box-price">
                                    <b><sup>&nbsp;&nbsp;$</sup>69<sup>95</sup></b>
                                    <span>Per Day</span>
                                </div>
                                <div class="prices-box-row"><span>Experienced & Trained Cleaner</span></div>
                                <div class="prices-box-row"><span><b>Maintenance</b> Cleaning</span></div>
                                <div class="prices-box-row"><span>Insured Liability & Damage</span></div>
                                <div class="prices-box-row"><span>Planned <b>Holiday</b> Cover</span></div>
                                <div class="prices-box-row"><span>You Choose from 3 Cleaning Days</span></div>
                                <div class="prices-box-link">
                                    <a href="order-form.html" class="btn">Order now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="prices-box">
                                <h3 class="prices-box-title">Premium Plan</h3>
                                <div class="prices-box-price">
                                    <b><sup>&nbsp;&nbsp;$</sup>89<sup>95</sup></b>
                                    <span>Per Day</span>
                                </div>
                                <div class="prices-box-row"><span>Experienced & Trained Cleaner</span></div>
                                <div class="prices-box-row"><span><b>Maintenance</b> Cleaning</span></div>
                                <div class="prices-box-row"><span>Insured Liability & Damage</span></div>
                                <div class="prices-box-row"><span>Planned <b>Holiday</b> Cover</span></div>
                                <div class="prices-box-row"><span>You Choose Cleaning Day</span></div>
                                <div class="prices-box-link">
                                    <a href="order-form.html" class="btn">Order now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="plan3" class="tab-pane fade in ">
                    <div class="row price-row price-carousel-tab">
                        <div class="col-md-6 col-lg-4">
                            <div class="prices-box">
                                <h3 class="prices-box-title">Start Plan</h3>
                                <div class="prices-box-price">
                                    <b><sup>&nbsp;&nbsp;$</sup>499<sup>95</sup></b>
                                    <span>Per Month</span>
                                </div>
                                <div class="prices-box-row"><span>Trained Cleaner</span></div>
                                <div class="prices-box-row"><span><b>Maintenance</b> Cleaning</span></div>
                                <div class="prices-box-row"><span>Liability Insurance</span></div>
                                <div class="prices-box-row"><span>Planned <b>Holiday</b> Cover</span></div>
                                <div class="prices-box-row"><span>Feedback Centre Access</span></div>
                                <div class="prices-box-link">
                                    <a href="order-form.html" class="btn">Order now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="prices-box prices-box--primary">
                                <h3 class="prices-box-title">Standard Plan</h3>
                                <div class="prices-box-price">
                                    <b><sup>&nbsp;&nbsp;$</sup>599<sup>95</sup></b>
                                    <span>Per Month</span>
                                </div>
                                <div class="prices-box-row"><span>Experienced & Trained Cleaner</span></div>
                                <div class="prices-box-row"><span><b>Maintenance</b> Cleaning</span></div>
                                <div class="prices-box-row"><span>Insured Liability & Damage</span></div>
                                <div class="prices-box-row"><span>Planned <b>Holiday</b> Cover</span></div>
                                <div class="prices-box-row"><span>You Choose from 3 Cleaning Days</span></div>
                                <div class="prices-box-link">
                                    <a href="order-form.html" class="btn">Order now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="prices-box">
                                <h3 class="prices-box-title">Premium Plan</h3>
                                <div class="prices-box-price">
                                    <b><sup>&nbsp;&nbsp;$</sup>799<sup>95</sup></b>
                                    <span>Per Month</span>
                                </div>
                                <div class="prices-box-row"><span>Experienced & Trained Cleaner</span></div>
                                <div class="prices-box-row"><span><b>Maintenance</b> Cleaning</span></div>
                                <div class="prices-box-row"><span>Insured Liability & Damage</span></div>
                                <div class="prices-box-row"><span>Planned <b>Holiday</b> Cover</span></div>
                                <div class="prices-box-row"><span>You Choose Cleaning Day</span></div>
                                <div class="prices-box-link">
                                    <a href="order-form.html" class="btn">Order now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Prices block -->

    <!-- Counter block -->
    <div class="block fullwidth-bg inset-lg-1 bg-cover js-bg-parallax" data-bg="{{ asset('services/images/block-bg-5.jpg') }}">
        <div class="container">
            <div class="row counter-row">
                <div class="col-xs-6 col-sm-3">
                    <div class="counter-item">
                        <div class="counter-item-icon"><i class="icon-user-rating"></i></div>
                        <span class="counter-item-number number"><span class="count" data-to="{{ $counter->customers }}"
                                data-speed="1000">{{ $counter->customers }}</span>+</span>
                        <div class="counter-item-text">Happy Customers</div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter-item">
                        <div class="counter-item-icon"><i class="icon-award"></i></div>
                        <span class="counter-item-number number"><span class="count" data-to="{{ $counter->service_guarantee }}"
                                data-speed="1000">{{ $counter->service_guarantee }}</span>%</span>
                        <div class="counter-item-text">Service Guarantee</div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter-item">
                        <div class="counter-item-icon"><i class="icon-648324users"></i></div>
                        <span class="counter-item-number number"><span class="count" data-to="{{ $counter->services }}"
                                data-speed="1000">{{ $counter->services }}</span>+</span>
                        <div class="counter-item-text">Services</div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="counter-item">
                        <div class="counter-item-icon"><i class="icon-cleaning"></i></div>
                        <span class="counter-item-number number"><span class="count" data-to="{{ $counter->seevices_completed }}"
                                data-speed="1000">{{ $counter->seevices_completed }}</span>+</span>
                        <div class="counter-item-text">Seevices Completed</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter block -->

    <!-- Testimonials Single Block -->
    <div class="block fullwidth-bg bg-cover block-testimonials-bg inset-lg-1" data-bg="{{ asset('services/images/block-bg-3.jpg') }}">
        <div class="container">
            <h2 class="text-center h-lg">Happy Customers,<br class="clearfix visible-xs"> Happy Homes</h2>
            <div class="testimonials-carousel">
                @if ($reviews)
                    @foreach ($reviews as $review)
                        <div class="testimonial-item">
                            <div class="testimonial-item-inside">
                                <p><i>{{ $review->review }}</i></p>
                            </div>
                            <div class="testimonial-item-author">
                                <img src="{{ asset('images/review/'.$review->image) }}" alt="">
                                <div><span class="testimonial-item-name">{{ $review->name }}</span> <span
                                        class="testimonial-item-position">{{ $review->position }}</span></div>
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
    <!--/ Testimonials Single Block -->

    <!-- News block -->
    <div class="block">
        <div class="container">
            <h2 class="text-center h-lg h-decor">Cleaning Industry News</h2>
            <div class="text-center max-700">
                <p class="p-lg">We write about industry developments, training, health and safety, eco-friendly
                    cleaning products, recycling practices and advice for working with professional cleaners.</p>
            </div>
            <div class="news-carousel row">
                @if ($blogs)
                    @foreach ($blogs as $blog)
                        <div class="col-sm-4">
                            <div class="news-prw">
                                <div class="news-prw-image">
                                    <a href="{{ route('blog-page.show',$blog->id) }}">
                                        <img src="{{ asset('images/blog/'.$blog->image) }}" alt="">
                                        <span><i class="icon-link"></i></span>
                                    </a>
                                </div>
                                <div class="news-prw-date">16 December, 2018</div>
                                <h3 class="news-prw-title">{{ $blog->title }}</h3>
                                <div style="overflow: hidden; height:50px">
                                    {!! $blog->post !!}
                                </div>
                                
                                <a href="{{ route('blog-page.show',$blog->id) }}" class="btn btn-border">Read more</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- /News block -->
    
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
    <script src="{{ asset('services/js/vendor/jarallax.min.js') }}"></script>
    <!-- Custom JavaScripts -->
    <script src="{{ asset('services/js/custom.js') }}"></script>
    <script src="{{ asset('services/js/forms.js') }}"></script>
    
@endsection