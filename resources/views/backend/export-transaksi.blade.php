<title>Laporan Data Transaksi</title>

<body style="font-family: sans-serif;">
        <div style="text-align: center;">
                <h2>Aplikasi Restoran</h2>
                <h5 style="margin-top: -15px">Laporan Data Transaksi</h5>
        </div>

        <div style="font-size: 11px;">
                @if(auth()->user()->role == 'kasir')
                <p>Kasir        : {{auth()->user()->nama}}</p>
                @endif
                
        </div>
        
        <table align="center">
                <thead>
                        <tr style="text-align: center; font-size: 13px">
                              <th scope="col">No</th>
                              <th scope="col">Nomor Pesanan</th>
                              <th scope="col">Nama Pelanggan</th>
                              <th scope="col">Total Pembayaran</th>
                              <th scope="col">Status</th>
                               @if(auth()->user()->role == 'owner' or auth()->user()->role == 'admin')
                              <th scope="col">Karyawan</th>
                              @endif
                              <th>Waktu</th>
                        </tr>
                </thead>
                <tbody>
                                {{$no=1}}
                                @foreach($transaksi as $k)
                                        <tr style="text-align: center; font-size: 12px;">
                                                <td>{{$no++}}</td>
                                                <td>{{$k->no_pesanan}}</td>
                                                <td>{{$k->nama_pelanggan}}</td>
                                                <td>{{$k->total_pembayaran}}</td>
                                                <td>{{$k->status}}</td>
                                                 @if(auth()->user()->role == 'owner' or auth()->user()->role == 'admin')
                                                <td>{{$k->nama}}</td>
                                                @endif
                                                <td>{{$k->created_at}}</td>
                                        </tr>
                                        @endforeach
                                
                </tbody>
        </table>
</body>