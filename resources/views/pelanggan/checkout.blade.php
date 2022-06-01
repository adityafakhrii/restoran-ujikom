@extends('pelanggan.layout.master')
<title>Checkout</title>

@section('content')
    
    <div class="row mt-lg-5 ml-lg-4">
        <div class="col-lg-10 mr-auto">
            <h3>Checkout</h3>
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
                <th scope="col">Total Harga</th>
                <th scope="col">Jumlah</th>
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
                <td>Rp{{$row->menu->harga*$row->jumlah}},00</td>
                <td>{{$row->jumlah}}</td>
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
    <div class="row ml-lg-4">
        <form action="/bayar" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="nama" class="col-sm-5 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                      <textarea name="keterangan" id="nama" placeholder="Masukkan keterangan (opsional)"></textarea>
                    </div>
                </div>
                <input type="hidden" name="id_pelanggan" value="{{Session::get('id_pelanggan')}}">
                <button onclick="return confirm('Konfirmasi Pesanan?')" style="cursor: pointer;" type="submit" class="btn btn-success">Bayar</button>
        </form>
    </div>
</div>
@endsection 