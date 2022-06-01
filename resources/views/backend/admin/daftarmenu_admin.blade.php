@extends('backend.layout.master')
<title>Daftar Menu</title>

@section('content')
	
	<div class="row mt-lg-5 ml-lg-4">
		<div class="col-lg-10 mr-auto">
			<h2>Data Menu</h2>
		</div>
		@if(auth()->user()->role == 'admin')
		<div class="col">
			<a href="/daftarmenu-admin/tambah" class="btn btn-outline-primary">Tambah Menu</a>
		</div>
		@endif
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-hover col-md-11 text-center">
		  <thead>
		    <tr class="text-center">
		      	<th scope="col">Gambar</th>
				<th scope="col">Nama Menu</th>
				<th scope="col">Harga</th>
				<th scope="col">Kategori</th>
				<th scope="col">Status</th>
				<th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    @foreach($menus as $menu)
			<tr>
				<td><img src="{{asset($menu->gambar)}}" alt="gambar" width="60" height="45"></td>
				<td>{{$menu->nama_menu}}</td>
				<td>{{$menu->harga}}</td>
				<td>{{$menu->kategori->nama_kat}}</td>
				<td>{{$menu->status}}</td>
				<td>
					<a class="btn btn-sm btn-outline-danger" href="daftarmenu-admin/hapus/{{$menu->id}}" onclick="return confirm('Anda Yakin?')">Hapus</a>
					<a class="btn btn-sm btn-outline-warning" href="daftarmenu-admin/edit/{{$menu->id}}">Edit</a>
				</td>
			
			</tr>
			@endforeach
		  </tbody>
		</table>

	</div>
@endsection