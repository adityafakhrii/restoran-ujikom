@extends('pelanggan.layout.master')
    <title>Keranjang</title>
@section('content')
<br><br>
<br><br>
<center>
			@foreach($keranjang as $k)
			<div class="card-food">
                <img class="gambar" src="{{asset($keranjang->menu->gambar)}}" alt="gambar" >
                <p class="kat">{{$keranjang->menu->kategori->nama_kat}}</p>
                <p class="nama">{{$keranjang->menu->nama_menu}}</p>
                <p class="harga">Rp. {{$keranjang->menu->harga}},-</p>
            </div>
                    <a href="/checkout/{{$keranjang->id}}" class="btn btn-orange">Bayar</a>
                    <a class="btn btn-orange" href="/batal-bayar/{{$keranjang->id}}">Batal</a>
            @endforeach
</center>
@endsection