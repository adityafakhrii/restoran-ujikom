@extends('backend.layout.master')
<title>Daftar Waiter</title>
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
			@foreach($waiters as $waiter)
			<tr>
			<td><img src="{{$waiter->foto}}" alt="" width="100" height="130" ></td>
				<td>{{$waiter->nama}}</td>
				<td>{{$waiter->email}}</td>
				<td><a href="hapus-karyawan/{{$waiter->id}}" onclick="return confirm('Anda Yakin?')">Hapus</a></td>
				<td><a href="edit-karyawan/{{$waiter->id}}">Edit</a></td>
			
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="/tambah-karyawan">Tambah Karyawan</a>
@endsection