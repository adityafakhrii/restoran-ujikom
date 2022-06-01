<?php

namespace App\Http\Controllers;
use App\Detail_pesanan;
use App\Pesanan;
use App\Transaksi;
use Session;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    

    public function index()
    {

    $keranjang = Detail_pesanan::all()->where('status','=','keranjang')->where('id_pelanggan','=',Session::get('id_pelanggan'));
    return view('pelanggan.keranjang',compact('keranjang'));
    }

    public function store(Request $request)
    {
        $keranjang = new Detail_pesanan;
        $keranjang->id_pelanggan = $request->id_pelanggan;
        $keranjang->id_menu = $request->id_menu;
        $keranjang->id_pesanan = null;
        $keranjang->jumlah = $request->jumlah;
        $keranjang->status = 'keranjang';
        $keranjang->save();

        return redirect('/daftarmenu')->with('keranjang','Sukses menambah ke keranjang...');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function add(Request $request, $id)
    {
        $keranjang = Detail_pesanan::find($id);
        $keranjang->update(['jumlah' => $keranjang->jumlah +1]);
        return redirect('keranjang');
    }

    public function min(Request $request, $id)
    {
        $keranjang = Detail_pesanan::find($id);
        if ($keranjang->jumlah == 1) {
            $keranjang = Detail_pesanan::find($id);
            $keranjang->delete();
        }else{
            $keranjang->update(['jumlah' => $keranjang->jumlah -1]);
        }
        return redirect('keranjang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = Detail_pesanan::find($id);
        $keranjang->delete();

        return redirect('keranjang');
    }
    

    public function checkout(){
        $keranjang = Detail_pesanan::all()->where('status','=','keranjang')->where('id_pelanggan','=',Session::get('id_pelanggan'));

        

        return view('pelanggan.checkout',compact('keranjang'));
    }

    public function bayar(Request $request,$id){

        $checkout = new Pesanan;
        $checkout->id_pelanggan = $request->id_pelanggan;
        $checkout->status = 'dipesan';
        $checkout->save();

        $keranjang = Detail_pesanan::find($id)->where('status','=','keranjang')->where('id_pelanggan','=',Session::get('id_pelanggan'));
        $keranjang->update(['status'=>'dipesan']);
        $keranjang->save();

        return redirect('daftarmenu');
    }

}
