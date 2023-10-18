@include('client.layout.header')

<body class="page-index">
	<div class="loading-content">
		<div class="loaded-text" data-text="Better Work Technical Services LLc">
			Better Work Technical Services LLc
		</div>
	</div>

	@include('client.layout.menu')

	<main class="page-main">
		@yield('content')
	</main>

    @include('client.layout.footer')