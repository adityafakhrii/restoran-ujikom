@extends('backend.layout.master')
<title>Tambah Karyawan</title>

@section('content')
	<div class="row mt-lg-5">
		<div class="col-lg-10 mr-auto">
			<h3>Tambah Karyawan</h3>
		</div>
	</div>

	<form action="/tambah-karyawan/store" method="POST">
		@csrf
		<div class="form-group row">
			<label for="nama" class="col-sm-2 col-form-label">Nama Karyawan</label>
			<div class="col-sm-10">
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama karyawan">
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email">
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
			</div>
		</div>

		<fieldset class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-2 pt-0">Status</legend>
				<div class="col-sm-10">
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="role" id="waiter" value="waiter">
						<label class="custom-control-label" for="waiter">Waiter</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" class="custom-control-input" name="role" id="kasir" value="kasir">
						<label class="custom-control-label" for="kasir">Kasir</label>
					</div>
				</div>
			</div>
		</fieldset>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>

	</form>


@endsection