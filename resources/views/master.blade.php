<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Games</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css">
	<link rel="stylesheet" href="{{ url(elixir('css/all.css')) }}">
	<link rel="stylesheet" href="{{ url(asset('css/lightbox.css')) }}">
	
	<script type="text/javascript">
		var baseUrl = "{{ url('/') }}";
	</script>
</head>
<body>
	<div class="container">
		@if(Session::has('flash_message'))
			<div class="alert alert-success">
				{{ Session::get('flash_message') }}
			</div>
		@endif

		@if(Session::has('flash_error'))
			<div class="alert alert-danger">
				{{ Session::get('flash_error') }}
			</div>
		@endif

		@yield('content')
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/lightbox.min.js') }}"></script>
	<script type="text/javascript" src="{{ url(elixir('js/all.js')) }}"></script>
</body>
</html>