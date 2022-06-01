</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login | Restoran</title>
        
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" crossorigin="anonymous">
        
    </head>
    <body>
    <div class="container mt-lg-5">
        <div class="row">
            <div class="col">
                <h3>Selamat datang! Silahkan Login</h3>
            </div>
        </div>
        <form action="/postpelanggan" method="POST">
            @csrf
          <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <input type="nama" name="nama" class="form-control" id="nama">
          </div>
          <div class="form-group">
            <label for="meja">No. Meja</label>
            <select required name="id_meja" class="custom-select" id="meja">
                <option selected disabled>Pilih No. Meja</option>
            @foreach($mejas as $meja)
                <option value="{{$meja->id}}">Meja No. {{$meja->no_meja}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="password">Password Meja</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="masukkan password meja">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if(Session::has('gagal'))
            <h4>Password meja salah</h4>
        @endif
    </div>
        
    </body>
</html>

