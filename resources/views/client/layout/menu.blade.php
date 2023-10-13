<!-- Header -->
<header class="page-header page-header--style2 header-sticky">
    <div class="page-header-mobile-info">
        <div class="page-header-mobile-info-content">
            <div class="page-header-info">
                <i class="icon icon-location"></i>{{ $company->address }}
            </div>
            <div class="page-header-info">
                <i class="icon icon-clock1"></i>{{ $company->operation_hour_1 }}
                <br> @if ($company->operation_hour_2)
                {{ $company->operation_hour_2 }}
                @endif
            </div>
            <div class="page-header-info">
                <i class="icon icon-phone"></i>Call: {{ $company->phone }}
            </div>
            <div class="page-header-info">
                <i class="icon icon-speech-bubble"></i><a
                    href="mailto:{{ $company->email }}">{{ $company->email }}</a>
            </div>
            <ul class="social-list">
                <li><a href="@if ($company->facebook)
                    https://{{ $company->facebook }}
                @else
                    {{ '#' }}
                @endif"><i class="icon-facebook-logo1"></i></a></li>
                <li><a href="@if ($company->twitter)
                    https://{{ $company->twitter }}
                @else
                    {{ '#' }}
                @endif"><i class="icon-twitter-logo1"></i></a></li>
                <li><a href="@if ($company->instagram)
                    https://{{ $company->instagram }}
                @else
                    {{ '#' }}
                @endif"><i class="icon-instagram-logo1"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="page-header-topline">
        <div class="container">
            <div class="page-header-mobile-info-toggle"></div>
            <div class="page-header-topline-left">
                <div class="page-header-info">
                    <i class="icon icon-location"></i>{{ $company->address }}
                </div>
                <div class="page-header-info">
                    <i class="icon icon-clock1"></i>{{ $company->operation_hour_1 }}
                    <br> @if ($company->operation_hour_2)
                    {{ $company->operation_hour_2 }}
                    @endif
                </div>
                <div class="page-header-info">
                    <i class="icon icon-phone"></i>Call: {{ $company->phone }}
                </div>
            </div>
            <div class="page-header-topline-right">
                <ul class="social-list">
                    <li><a href="@if ($company->facebook)
                        https://{{ $company->facebook }}
                    @else
                        {{ '#' }}
                    @endif"><i class="icon-facebook-logo1"></i></a></li>
                    <li><a href="@if ($company->twitter)
                        https://{{ $company->twitter }}
                    @else
                        {{ '#' }}
                    @endif"><i class="icon-twitter-logo1"></i></a></li>
                    <li><a href="@if ($company->instagram)
                        https://{{ $company->instagram }}
                    @else
                        {{ '#' }}
                    @endif"><i class="icon-instagram-logo1"></i></a></li>
                </ul>
                <div class="quote-button-wrap">
                    <a href="{{ route('order-page.index') }}" class="btn"><i class="icon icon-bell"></i>Get a Quote</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header-top">
        <div class="container">
            <div class="logo">
                <a href="{{ route('client.home') }}"><img src="{{ asset('images/logo/logo.png') }}" alt=""></a>
                <div class="shine"></div>
            </div>
            <div class="page-header-menu">
                <div class="container">
                    <ul class="menu">
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('client.home') }}">HOME<span class="arrow"></span></a></li>
                        <li class="{{ request()->is('about-page') ? 'active' : '' }}"> <a href="{{ route('client.about-page') }}">About<span class="arrow"></span></a></li>
                        <li class="{{ request()->is('gallery-page') ? 'active' : '' }}"><a href="{{ route('client.gallery-page') }}">Gallery<span class="arrow"></span></a></li>
                        <li class="{{ request()->is('service-page/*') ? 'active' : '' }}"><a href="{{ route('service-page.index') }}">Services<span class="arrow"></span></a>
                            <ul class="sub-menu">
                                @foreach ($services as $service)
                                    
                                <li><a href="@if ($service->service_details)
                                    {{ route('service-page.show',$service->service_details->id) }}
                                @else
                                    '#'
                                @endif">{{ $service->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ request()->is('blog-page/*') ? 'active' : '' }}"><a href="{{ route('blog-page.index') }}">Blog<span class="arrow"></span></a>
                        </li>
                        <li class="{{ request()->is('contact-page') ? 'active' : '' }}"><a href="{{ route('client.contact-page') }}">Contacts</a></li>
                        @if (Auth::guard('web')->user())
                            <li> <a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                        
                    </ul>
                </div>
            </div>
            {{-- <div class="page-header-top-right">
                <div class="header-search">
                    <div class="header-search-toggle"><i class="icon-search"></i></div>
                    <div class="header-search-drop">
                        <form action="#" class="form-inline">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="icon-search"></i></button>
                        </form>
                    </div>
                </div>
                <a href="#" class="menu-toggle"><i class="icon-menu"></i><i class="icon-cancel2"></i></a>
            </div> --}}
        </div>
    </div>
</header>
<!-- Header -->