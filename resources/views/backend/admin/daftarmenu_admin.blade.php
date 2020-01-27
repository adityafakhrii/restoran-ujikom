@extends('backend.layout.master')
<title>Daftar Menu</title>
@section('content')
	<table>
		<thead>
			<tr>
				<td>Gambar</td>
				<td>Nama Menu</td>
				<td>Harga</td>
				<td>Kategori</td>
				<td>Status</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
			@foreach($menus as $menu)
			<tr>
			
			
				<td><img src="{{asset($menu->gambar)}}" alt="gambar" width="60" height="45"></td>
				<td>{{$menu->nama_menu}}</td>
				<td>{{$menu->harga}}</td>
				<td>{{$menu->kategori->nama_kat}}</td>
				<td>{{$menu->status}}</td>
				<td><a href="daftarmenu-admin/hapus/{{$menu->id}}" onclick="return confirm('Anda Yakin?')">Hapus</a></td>
				<td><a href="daftarmenu-admin/edit/{{$menu->id}}">Edit</a></td>
			
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="/daftarmenu-admin/tambah">Tambah Menu</a>
@endsection