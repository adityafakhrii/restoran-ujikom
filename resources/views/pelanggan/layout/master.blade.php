<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	{{-- <link rel="stylesheet" type="text/css" href="{{asset('style/style.css')}}"> --}}
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" crossorigin="anonymous">
</head>
<body>
	
	@include('pelanggan.layout.include.__navbar')

	<div class="container">
        

        @yield('content')

        {{-- @include('backend.layout.__footer') --}}


    </div>
</body>
</html>