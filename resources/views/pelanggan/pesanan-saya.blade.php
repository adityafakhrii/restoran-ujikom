@extends('pelanggan.layout.master')
<title>Pesanan Saya</title>

@section('content')
    
    <div class="row mt-lg-5 ml-lg-4">
        <div class="col-lg-10 mr-auto">
            <h3>Pesanan Saya</h3>
        </div>
        
    </div>
    
    <br>
     <div class="row justify-content-md-center">
                

        <table class="table table-hover col-md-11 text-center">
          <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nomor Pesanan</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
            @foreach($pesanan as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->pesanan->no_pesanan}}</td>
                <td>{{$row->menu->nama_menu}}</td>
                <td>Rp{{$row->menu->harga}},00</td>
                <td>{{$row->jumlah}}</td>
                <td>Rp{{$row->menu->harga*$row->jumlah}},00</td>
                <td>{{$row->pesanan->status}}</td>
                
            
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
                    foreach ($pesanan as $row) {
                        $harga = $harga + ($row->menu->harga*$row->jumlah);
                    }
                ?>
            <span style="font-weight: bold;">Rp{{$harga}},00</span>

            </p>
    </div>
</div>
@endsection 