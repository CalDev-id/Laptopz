<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>{{ env('APP_NAME') . (isset($title) ? " | {$title}" : '') }}</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
	<link href="/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="/dist/css/adminlte.min.css" rel="stylesheet">
	@yield('link-head')
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="{{ (session('dark-mode') ? 'dark-mode' : '') . (isset($bodyClass) ? " {$bodyClass}" : '') }}">
	<script src="/plugins/jquery/jquery.min.js"></script>
	<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/dist/js/adminlte.js"></script>
	@yield('content')
</body>

</html>
