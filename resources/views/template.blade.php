<!doctype html>
<html lang="{{ config('app.locale') }}">
@include('layout.system.head')
<body>
@include('layout.header')

<main>
	@yield('content')
</main>

@include('layout.footer')
</body>
</html>
