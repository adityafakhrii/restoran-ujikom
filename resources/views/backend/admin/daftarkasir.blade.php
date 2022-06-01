@extends('backend.layout.master')
<title>Data Kasir</title>

@section('content')
	
	<div class="row mt-lg-5 ml-lg-4">
		<div class="col-lg-10 mr-auto">
			<h2>Daftar Kasir</h2>
		</div>
		<div class="col">
			<a href="/tambah-karyawan" class="btn btn-outline-primary">Tambah Kasir</a>
		</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-hover col-md-11">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      {{-- <th scope="col">Foto</th> --}}
		      <th scope="col">Nama</th>
		      <th scope="col">Email</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    @foreach($kasirs as $kasir)
				<tr>
					<td>{{$no++}}</td>
					{{-- <td><img src="{{$kasir->foto}}" alt="" width="100" height="130" ></td> --}}
					<td>{{$kasir->nama}}</td>
					<td>{{$kasir->email}}</td>
					<td>
						<a class="btn btn-sm btn-outline-danger" href="edit-karyawan/{{$kasir->id}}" onclick="return confirm('Anda Yakin?')">Hapus</a>
						<a class="btn btn-sm btn-outline-warning" href="edit-karyawan/{{$kasir->id}}">Edit</a>
					</td>
				</tr>
				@endforeach
		  </tbody>
		</table>

	</div>
@endsection