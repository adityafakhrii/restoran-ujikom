@extends('backend.layout.master')
    <title>Edit Menu | Restaurant</title>

@section('content')
<div class="login-box">
	<form action="/daftarmenu-admin/update/{{$menu->id}}" method="POST" enctype="multipart/form-data">
		@csrf
		
		<input type="file" name="gambar"><br><br>
		<input class="input" type="text" name="nama_menu" value="{{$menu->nama_menu}}"><br><br>
		<input class="input" type="text" name="harga" value="{{$menu->harga}}"><br><br>
		<select class="input" name="status">
			<option value="tersedia">Tersedia</option>
			<option value="habis">Habis</option>
		</select><br><br>
		<select name="id_kategori" class="input">
			@foreach($kategoris as $kategori)
				<option value="{{$kategori->id}}">{{$kategori->nama_kat}}</option>
			@endforeach
		</select>
		<br><br>
		<button type="submit" class="btn btn-grey">Submit</button>
	</form>
</div>
	
@endsection