@extends('backend.layout.master')
<title>Daftar Kasir</title>
@section('content')
	<table>
		<thead>
			<tr>
				<td>Foto</td>
				<td>Nama</td>
				<td>Email</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
			@foreach($kasirs as $kasir)
			<tr>
			<td><img src="{{$kasir->foto}}" alt="" width="100" height="130" ></td>
				<td>{{$kasir->nama}}</td>
				<td>{{$kasir->email}}</td>
				<td><a href="edit-karyawan/{{$kasir->id}}" onclick="return confirm('Anda Yakin?')">Hapus</a></td>
				<td><a href="edit-karyawan/{{$kasir->id}}">Edit</a></td>
			
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="/tambah-karyawan">Tambah Karyawan</a>
@endsection