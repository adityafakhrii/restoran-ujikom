<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laundry</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" crossorigin="anonymous">
</head>
<body>

    @include('backend.layout.__header')

    <div class="container">
        

        @yield('content')

        {{-- @include('backend.layout.__footer') --}}


    </div>
    
    
</body>
</html>