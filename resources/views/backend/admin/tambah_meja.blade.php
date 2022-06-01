@extends('backend.layout.master')
    <title>Tambah Karyawan | Restaurant</title>

@section('content')

<div class="login-box" style="margin-top: 120px;">
	<form action="/tambah-karyawan/store" method="POST" enctype="multipart/form-data">
		@csrf
	
		<input type="file" name="foto"><br><br>
		<input class="input" type="text" name="username" placeholder="Username..."><br><br>
		<input class="input" type="text" name="nama" placeholder="Nama Karyawan"><br><br>
		<input type="email" name="email" placeholder="Email..." class="input"><br><br>

		<input type="password" placeholder="Password..." class="input" name="password"><br><br>

		<select class="input" name="role">
			<option value="waiter">Waiter</option>
			<option value="kasir">Kasir</option>
		</select><br><br>
		
		<button type="submit" class="btn btn-grey">Submit</button>
	</form>
</div>

@endsection