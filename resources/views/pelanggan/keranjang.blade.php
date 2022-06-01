@extends('pelanggan.layout.master')
<title>Keranjang</title>

@section('content')
    
    <div class="row mt-lg-5 ml-lg-4">
        <div class="col-lg-10 mr-auto">
            <h3>Keranjang</h3>
        </div>
        <div class="col">
            <a href="checkout" class="btn btn-success">Checkout</a>
        </div>
    </div>
    
    <br>
     <div class="row justify-content-md-center">
                

        <table class="table table-hover col-md-11 text-center">
          <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total Harga</th>
                <th scope="col" colspan="3">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
            @foreach($keranjang as $row)
            <tr>
                <td>{{$no++}}</td>
                <td><img src="{{asset($row->menu->gambar)}}" alt="gambar" width="60" height="45"></td>
                <td>{{$row->menu->nama_menu}}</td>
                <td>Rp{{$row->menu->harga}},00</td>
                <td>{{$row->jumlah}}</td>
                <td>Rp{{$row->menu->harga*$row->jumlah}},00</td>
                <td>
                    <form action="/keranjang/min/{{$row->id}}" method="POST" class="formaddmin">
                    @csrf
                    <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-outline-danger">-</button>
                    </form>
                </td>
                <td>
                    <a href="/keranjang/hapus/{{$row->id}}" class="btn btn-sm btn-danger">Hapus</a>
                    
                </td>
                <td>
                    <form action="/keranjang/add/{{$row->id}}" method="POST" class="formaddmin">
                        @csrf
                        <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-outline-danger">+</button>
                    </form>
                </td>
                
            
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
<div class="col">
    <div class="row mt-lg-5 ml-lg-4">
            <p>Total Pembayaran : 
                <?php 
                    $harga = 0;
                    foreach ($keranjang as $row) {
                        $harga = $harga + ($row->menu->harga*$row->jumlah);
                    }
                ?>
            <span style="font-weight: bold;">Rp{{$harga}},00</span>

            </p>
    </div>
</div>
@endsection 