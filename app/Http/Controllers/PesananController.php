<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Transaksi;
use Session;
use App\Detail_pesanan;
use DB;
use PDF;
class PesananController extends Controller
{
    
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('backend.waiter.data-pesanan',compact('pesanan'));
    }

   
    public function diterima($id)
    {
        $pesanan = Pesanan::where('id',$id);
        $pesanan->update([
            'status' => 'diterima',
            'id_user' => auth()->user()->id
        ]);

        return redirect('data-pesanan');
    }

    public function dibayar($id)
    {
        $pesanan = Pesanan::where('id',$id);
        $pesanan->update([
            'status' => 'dibayar'
        ]);

        return redirect('data-pesanan');
    }

    public function dibatalkan($id)
    {
        $pesanan = Pesanan::where('id',$id);
        $pesanan->delete();

        $pesanan = Transaksi::where('id',$id);
        $pesanan->delete();

        return redirect('data-pesanan');
    }

    
    public function store(Request $request)
    {
        $pesanan = new Pesanan;
        $pesanan->no_pesanan = rand(1111111111,9999999999);
        $pesanan->id_pelanggan = $request->id_pelanggan;
        $pesanan->keterangan = $request->keterangan;
        $pesanan->status = 'dipesan';
        $pesanan->save();

        $transaksi = new Transaksi;
        $transaksi->id_pesanan = $pesanan->id;
        $transaksi->id_pelanggan = $request->id_pelanggan;

        $harga = 0;
        $keranjang = Detail_pesanan::all()->where('status','=','keranjang')->where('id_pelanggan','=',Session::get('id_pelanggan'));
                    foreach ($keranjang as $row) {
                        $harga = $harga + ($row->menu->harga*$row->jumlah);
                    }

        $transaksi->total_pembayaran = $harga;
        $transaksi->status = 'diterima';
        $transaksi->save();
        
        // $request->request->add(['id_pesanan' => $pesanan->id]);
        Detail_pesanan::where('status', '=', 'keranjang')
                        ->where('id_pelanggan','=',Session::get('id_pelanggan'))
                        ->update([
                            'status' => 'dipesan',
                            'id_pesanan' => $pesanan->id
                        ]);

        $request->session()->put('dibayar','dibayar');

        return redirect('order-dibuat')->with('sukses',$pesanan->no_pesanan);
    }

    
    public function export(){
         $pesanan = DB::table('pesanans')
                ->join('pelanggans','pesanans.id_pelanggan','=','pelanggans.id')
                ->join('users','pesanans.id_user','=','users.id')
                ->select('pesanans.*','pesanans.no_pesanan','pesanans.keterangan','users.nama','pelanggans.nama_pelanggan')
                // ->whereNotIn('tb_transaksi.status',['baru'])
                ->orderBy('pesanans.created_at','asc')
                ->get();
        $pdf = PDF::loadView('backend.export-pesanan',compact('pesanan'));
        return $pdf->stream('Laporan Data Pesansn');
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
