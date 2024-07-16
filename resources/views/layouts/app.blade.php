<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel Task List App</title>
	<h1>@yield('styles')</h1>
</head>
<body>
	<h1>@yield('title')</h1>
	@if(session()->has('success'))
		<div>{{ session('success') }}</div>
	@endif

	<div>
		@yield('content')
	</div>
</body>
</html>