<?php

namespace App\Http\Controllers;
use App\Transaksi;
use App\Meja;
use App\Pesanan;
use Session;
use App\User;
use DB;
use PDF;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('backend.kasir.data-transaksi',compact('transaksi'));
    }

    public function bayar(Request $request, $id)
    {
        $transaksi = Transaksi::where('id',$id);
        $transaksi->update([
            'status' => 'dibayar',
            'id_user' => auth()->user()->id
        ]);

        $pesanan = Pesanan::where('id', $id);
        $pesanan->update([
            'status' => 'dibayar'
        ]);

        $meja = Meja::where('id','=',Session::get('no_meja'))->first();
        $meja->update([
        	'status' => 'kosong'
        ]);

        Session::forget('login');

        return redirect('data-transaksi');
    }

    public function export(){
         $transaksi = DB::table('transaksis')
                ->join('pesanans','transaksis.id_pesanan','=','pesanans.id')
                ->join('pelanggans','transaksis.id_pelanggan','=','pelanggans.id')
                ->join('users','transaksis.id_user','=','users.id')
                ->select('transaksis.*','pesanans.no_pesanan','transaksis.total_pembayaran','users.nama','pelanggans.nama_pelanggan')
                // ->whereNotIn('tb_transaksi.status',['baru'])
                ->orderBy('transaksis.created_at','asc')
                ->get();
        $pdf = PDF::loadView('backend.export-transaksi',compact('transaksi'));
        return $pdf->stream();
    }
}
