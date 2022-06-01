
@extends('pelanggan.layout.master')
<title>Daftar Menu</title>

@section('content')
	
	<div class="row mt-lg-5 ml-lg-4">
		<div class="col-lg-10 mr-auto" >
			<h3>Selamat Datang {{Session::get('nama')}} yang duduk di meja no. {{Session::get('no_meja')}}</h3>
			<p class="text">Disini Kamu ga bakal nemu menu yang ngebosenin,<br> Coba aja kalo ga percaya!</p>
		</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-hover col-md-11 text-center">
		  <thead>
		    <tr class="text-center">
		      	<th scope="col">No</th>
		      	<th scope="col">Gambar</th>
				<th scope="col">Nama Menu</th>
				<th scope="col">Harga</th>
				<th scope="col">Kategori</th>
				<th scope="col">Jumlah</th>
				<th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    @foreach($cari as $menu)
			<tr>
				<td>{{$no++}}</td>
				<td><img src="{{asset($menu->gambar)}}" alt="gambar" width="60" height="45"></td>
				<td>{{$menu->nama_menu}}</td>
				<td>Rp{{$menu->harga}},00</td>
				<td>{{$menu->kategori->nama_kat}}</td>
				@if($menu['status'] == 'tersedia')
					<form action="{{action('KeranjangController@store',$menu->id)}}" method="POST">
					
						<td>
							<input type="text" name="jumlah" class="input-group-sm text-center" placeholder="masukkan jumlah" required>
						</td>
						@csrf
	                    <input type="hidden" name="id_menu" value="{{$menu->id}}">
	                    <input type="hidden" name="id_pelanggan" value="{{Session::get('id_pelanggan')}}">

	                    <td>
	                    	<button style="cursor: pointer;" type="submit" class="btn btn-sm btn-success">Pesan</button>
	                    </td>
					</form>
					@elseif($menu['status'] == 'habis')
						<td>
							<input type="text" name="jumlah" class="input-group-sm" disabled>
						</td>
					<td>
						<button href="/pesan" class="btn btn-sm btn-secondary" disabled>Habis</button>
					</td>
					@endif
				</td>
			
			</tr>
			@endforeach
		  </tbody>
		</table>

<h4>{{Session::get('keranjang')}}</h4>
	</div>
@endsection	