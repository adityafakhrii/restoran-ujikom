@extends('backend.layout.master')
<title>Data Transaksi | Waiter</title>

@section('content')
    
    <div class="row mt-lg-5 ml-lg-4">
        <div class="col-lg-10 mr-auto">
            <h3>Data Transaksi | {{auth()->user()->nama}}</h3>
        </div>
        <div class="col">
            <a href="/laporan-transaksi" target="_blank" class="btn btn-primary">Generate Laporan</a>
        </div>
    </div>
    
    <br>
     <div class="row justify-content-md-center">
                

        <table class="table table-hover col-md-11 text-center">
          <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nomor Pesanan</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Total Pembayaran</th>
                @if(auth()->user()->role == 'kasir')
                <th scope="col">Bayar</th>
                @endif
                <th scope="col">Status</th>
                @if(auth()->user()->role == 'owner' or auth()->user()->role == 'admin')
                <th scope="col">Karyawan</th>
                @endif
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
            @foreach($transaksi as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->pesanan->no_pesanan}}</td>
                <td>{{$row->pelanggan->nama_pelanggan}}</td>
                <td>Rp{{$row->total_pembayaran}},00</td>
                <td>
                    @if($row->status == 'diterima' && auth()->user()->role == 'kasir')
                        <form action="/transaksi/bayar/{{$row->id}}" method="POST" class="formaddmin">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-primary">Bayar</button>
                        </form>
                    @elseif($row->status == 'dibayar' && auth()->user()->role == 'kasir')
                    sudah
                    @endif
                </td>
                <td>{{$row->status}}</td>
                @if(auth()->user()->role == 'owner' or auth()->user()->role == 'admin')
                <td>
                    @if($row->id_user == null)
                        -
                    @else
                    {{$row->user->nama}}
                    @endif
                </td>
                @endif
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection 