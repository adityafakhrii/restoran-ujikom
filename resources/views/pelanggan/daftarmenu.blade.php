@extends('pelanggan.layout.master')
	<title>Daftar Menu</title>
@section('content')
	
	<div class="center">
		<h3>Selamat Datang {{Session::get('nama')}} yang duduk di meja no. {{Session::get('no_meja')}}</h3>
		<p class="text">Disini Kamu ga bakal nemu menu yang ngebosenin,<br> Coba aja kalo ga percaya!</p>
	</div>

	<div class="row">

		@foreach($menus as $menu)
			<div class="card-food">
				<img class="gambar" src="{{asset($menu->gambar)}}" alt="gambar" >
				<p class="kat">{{$menu->kategori->nama_kat}}</p>
				<p class="nama">{{$menu->nama_menu}}</p>
				<p class="harga">Rp. {{$menu->harga}},-</p>
				@if($menu['status'] == 'tersedia')
				<a href="/pesan" class="order">Order Sekarang</a>
				@elseif($menu['status'] == 'habis')
				<a href="/pesan" class="out" disabled>Habis</a>
				@endif
			</div>
		@endforeach
	</div>
	

@endsection