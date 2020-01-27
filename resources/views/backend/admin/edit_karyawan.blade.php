@extends('backend.layout.master')
    <title>Edit Karyawan | Restaurant</title>

@section('content')
<div class="login-box" style="margin-top: 120px;">
	<form action="/update-karyawan/{{$user->id}}" method="POST" enctype="multipart/form-data">
		@csrf
		
		<input type="file" name="foto"><br><br>
		<input class="input" type="text" name="username" placeholder="Username..." value="{{$user->username}}"><br><br>
		<input class="input" type="text" name="nama" placeholder="Nama Karyawan" value="{{$user->nama}}"><br><br>
		<input type="email" name="email" placeholder="Email..." class="input" value="{{$user->email}}"><br><br>

		<input type="password" placeholder="Password..." class="input" name="password"><br><br>

		<select class="input" name="role">
			<option value="waiter">Waiter</option>
			<option value="kasir">Kasir</option>
		</select><br><br>
		
		<button type="submit" class="btn btn-grey">Submit</button>
	</form>
</div>
	
@endsection