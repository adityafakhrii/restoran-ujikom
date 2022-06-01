@extends('backend.layout.master')
<title>Data Pesanan | Waiter</title>

@section('content')
    
    <div class="row mt-lg-5 ml-lg-4">
        <div class="col-lg-10 mr-auto">
            <h3>Data Pesanan | {{auth()->user()->nama}}</h3>
        </div>
        <div class="col">
            <a href="/laporan-pesanan" target="_blank" class="btn btn-primary">Generate Laporan</a>
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
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                @if(auth()->user()->role == 'waiter')
                <th scope="col">Konfirmasi Pesanan</th>
                @elseif(auth()->user()->role == 'owner' or auth()->user()->role == 'admin')
                <th scope="col">Karyawan</th>
                @endif
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; ?>
            @foreach($pesanan as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->no_pesanan}}</td>
                <td>{{$row->pelanggan->nama_pelanggan}}</td>
                <td>{{$row->keterangan}}</td>
                <td>{{$row->status}}</td>
                @if(auth()->user()->role == 'waiter')
                <td>
                    @if($row->status == 'dipesan')
                    <div class="col">
                        <form action="/pesanan/diterima/{{$row->id}}" method="POST" class="formaddmin">
                            @csrf
                            <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-outline-success">Diterima</button>
                        </form>
                        <form action="/pesanan/dibatalkan/{{$row->id}}" method="POST" class="formaddmin">
                            @csrf
                            <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-outline-danger">Dibatalkan</button>
                        </form>
                    </div>
                    @elseif($row->status == 'diterima')
                        <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-secondary" disabled>oleh kasir</button>
                    @elseif($row->status == 'dibayar')
                        <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-secondary" disabled>Pesanan Selesai</button>
                    @endif
                </td>
                @elseif(auth()->user()->role == 'owner' or auth()->user()->role == 'admin')
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