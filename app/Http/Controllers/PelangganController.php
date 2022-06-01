<?php

namespace App\Http\Controllers;
use App\Pelanggan;
use App\Meja;
use App\Detail_pesanan;
use Auth;
use Session;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(){
        if (Session::get('login')) {
            return redirect('/daftarmenu');
        }else{
           $mejas = Meja::where('status','=','kosong')->get();
            return view('pelanggan.login_pelanggan',compact('mejas')); 
        }
    	
    }

    public function postpelanggan(Request $request){
    	
        //cek password meja
        $meja = Meja::where('id','=',$request->id_meja)->first();

        if ($meja->id == $request->id_meja && $meja->password == $request->password ) {

            $pelanggan = new Pelanggan;
            $pelanggan->nama_pelanggan = $request->nama;
            $pelanggan->id_meja = $request->id_meja;
            $pelanggan->save();

            $meja = Meja::where('id',$pelanggan->id_meja)->update(['status' => 'terisi']);

            Session::put('login', TRUE);
            Session::put('nama',$request->nama);
            Session::put('no_meja',$request->id_meja);
            Session::put('id_pelanggan',$pelanggan->id);
            Session::put('keranjang','keranjang');

    	   return redirect('/daftarmenu');
        }else {
            return redirect('/')->with('gagal','Password Meja Salah...');
        }
    }

    public function home(){
        return view('pelanggan.home');
    }

    public function logout($id){
        $meja = Meja::find($id);
        $meja->update(['status'=>'kosong']);

        Session::forget();

        return redirect('/');
    }

    public function pesanan(){
        $pesanan = Detail_pesanan::where('id_pelanggan','=',Session::get('id_pelanggan'))->get();
        return view('pelanggan.pesanan-saya',compact('pesanan'));
    }
}
