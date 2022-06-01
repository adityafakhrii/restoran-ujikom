@extends('backend.layout.master')
<title>Data Waiter | Laundry</title>

@section('content')
	
	<div class="row mt-lg-5 ml-lg-4">
		<div class="col-lg-10 mr-auto">
			<h2>Daftar Waiter</h2>
		</div>
		<div class="col">
			<a href="/tambah-karyawan" class="btn btn-outline-primary">Tambah Waiter</a>
		</div>
	</div>
	
	 <div class="row justify-content-md-center">
				

		<table class="table table-hover col-md-11">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Email</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    @foreach($waiters as $waiter)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$waiter->nama}}</td>
				<td>{{$waiter->email}}</td>
				<td>
					<a class="btn btn-sm btn-outline-danger" href="hapus-karyawan/{{$waiter->id}}" onclick="return confirm('Anda Yakin?')">Hapus</a>
					<a class="btn btn-sm btn-outline-warning" href="edit-karyawan/{{$waiter->id}}">Edit</a>
				</td>
			
			</tr>
			@endforeach
		  </tbody>
		</table>
	</div>
@endsection