@include('requieds/header')

<body>

	@include('requieds/sidebar')
	
	<div class="wrapper">
    	<div class="main-panel">

    		@include('requieds/navbar')
			@yield('body')

    	</div>
	</div>

</body>

@include('requieds/footer')