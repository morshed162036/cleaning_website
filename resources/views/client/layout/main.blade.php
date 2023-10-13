@include('client.layout.header')

<body class="page-index">
	<div class="loading-content">
		<div class="loaded-text" data-text="Zariq Ltd - cleaning website">
			Zariq Ltd - cleaning website
		</div>
	</div>

	@include('client.layout.menu')

	<main class="page-main">
		@yield('content')
	</main>

    @include('client.layout.footer')