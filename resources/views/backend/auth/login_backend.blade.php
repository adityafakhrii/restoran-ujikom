<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login | Backend</title>
        
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" crossorigin="anonymous">
        
    </head>
    <body>
    <div class="container mt-lg-5">
        <div class="row">
            <div class="col">
                <h3>Silahkan Login</h3>
            </div>
        </div>
        <form action="postbackend" method="POST">
            @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email anda...">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password anda...">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if(Session::has('fail'))
            <h3>Login Gagal</h3>
        @endif
    </div>
        
    </body>
</html>
