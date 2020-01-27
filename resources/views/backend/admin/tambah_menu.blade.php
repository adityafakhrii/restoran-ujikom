@extends('backend.layout.master')
    <title>Tambah Menu | Restaurant</title>

@section('content')
<div class="login-box" style="margin-top: 120px;">
	<form action="/daftarmenu-admin/store" method="POST" enctype="multipart/form-data">
		@csrf
	
		<input type="file" name="gambar"><br><br>
		<input class="input" type="text" name="nama_menu" placeholder="Nama menu"><br><br>
		<input class="input" type="text" name="harga" placeholder="Harga"><br><br>
		<select class="input" name="status">
			<option value="tersedia">Tersedia</option>
			<option value="habis">Habis</option>
		</select><br><br>
		<select class="input" name="id_kategori">
			@foreach($kategoris as $kategori)
				<option value="{{$kategori->id}}">{{$kategori->nama_kat}}</option>
			@endforeach
		</select><br><br>
		<button type="submit" class="btn btn-grey">Submit</button>
	</form>
</div>

@endsection