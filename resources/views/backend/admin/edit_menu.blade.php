@extends('backend.layout.master')
<title>Edit Menu</title>

@section('content')
	<div class="row mt-lg-5">
		<div class="col-lg-10 mr-auto">
			<h3>Edit Menu</h3>
		</div>
		
	</div>

	<form action="/daftarmenu-admin/update/{{$menu->id}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
		    <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
		    <div class="col-sm-10">
		      <input type="file" name="gambar" id="gambar" >
		    </div>
		</div>
		
		<div class="form-group row">
			<label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu</label>
			<div class="col-sm-10">
				<input type="text" name="nama_menu" id="nama_menu" class="form-control" placeholder="Masukkan nama menu" value="{{$menu->nama_menu}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="harga" class="col-sm-2 col-form-label">Nama Menu</label>
			<div class="col-sm-10">
				<input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan harga menu" value="{{$menu->harga}}">
			</div>
		</div>

		<fieldset class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-2 pt-0">Status</legend>
				<div class="col-sm-10">
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="status" id="tersedia" value="tersedia">
						<label class="custom-control-label" for="tersedia">Tersedia</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="status" id="habis" value="habis">
						<label class="custom-control-label" for="habis">Habis</label>
					</div>
				</div>
			</div>
		</fieldset>

		<fieldset class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-2 pt-0">Kategori</legend>
				<div class="col-sm-10">
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="id_kategori" id="makanan" value="1">
						<label class="custom-control-label" for="makanan">Makanan</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="id_kategori" id="minuman" value="2">
						<label class="custom-control-label" for="minuman">Minuman</label>
					</div>
				</div>
			</div>
		</fieldset>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/daftarmenu-admin" class="btn btn-warning">Batal</a>

		</div>

	</form>


@endsection