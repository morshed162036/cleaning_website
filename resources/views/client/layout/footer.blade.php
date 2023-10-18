<!-- Footer -->
	<!-- style="background-color: #24AAA3;" -->
	<footer class="page-footer page-footer--style2">
		<div class="container">
			<div class="page-footer-content row">
				<div class="col-sm-4">
					<div class="footer-ribbon"><img src="{{ asset('services/images/footer-ribbon.png')}}" alt=""></div>
					<div class="page-footer-text">
						<p class="footer_text">We use natural and eco-friendly cleaning products and have a customer
							satisfaction guarantee.
						</p>
					</div>
					<div class="page-footer-bottomline-right">
						<ul class="social-list">
							<li><a href="@if ($company->facebook)
								https://{{ $company->facebook }}
		
							@endif"><i class="icon-facebook-logo1" id="social-list"></i></a></li>
							<li><a href="@if ($company->twitter)
								https://{{ $company->twitter }}
		
							@endif"><i class="icon-twitter-logo1" id="social-list"></i></a></li>
							<li><a href="@if ($company->instagram)
								https://{{ $company->instagram }}
		
							@endif"><i class="icon-instagram-logo1" id="social-list"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4">
					<h4 class="footer_text">Cleaning Services</h4>
					<ul class="marker-list">
						@foreach ($services as $service)
							<li><a class="footer_text" href="@if ($service->service_details)
								{{ route('service-page.show',$service->service_details->id) }}
								@endif">{{ $service->title }}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-4">
					<h4 class="footer_text">Contact Information</h4>
					<div class="page-footer-info footer_text">
						<i class="icon icon-location "></i>{{ $company->address }}
					</div>
					<div class="page-footer-info">
						<i class="icon icon-phone"></i><span class="text-nowrap footer_text">{{ $company->phone }}</span> @if ($company->fax)
							<span class="text-nowrap footer_text">, Fax: {{ $company->fax }}</span>
						@endif
					</div>
					<div class="page-footer-info">
						<i class="icon icon-letter"></i><a href="mailto:{{ $company->email }}"
							class="footer_text">{{ $company->email }}</a>
					</div>
					<div class="page-footer-info footer_text">
						<i class="icon icon-clock1 "></i>{{ $company->operation_hour_1 }}
						<br> @if ($company->operation_hour_2)
						{{ $company->operation_hour_2 }}
						@endif
					</div>

				</div>
			</div>
		</div>
		<div class="page-footer-bottomline">
			<div class="container">
				<div class="page-footer-bottomline-left">
					<div class="footer-copyright footer_text"> Design and Development By <span
							class="text-info footer_text">ZARIQ LTD</span>
					</div>
				</div>

			</div>
		</div>
		<div class="backToTop js-backToTop">
			<i class="icon icon-right-arrow"></i>
		</div>
	</footer>
	<!-- /Footer -->
	@yield('js')
</body>

</html>