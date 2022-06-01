<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';
    protected $guarded = [];

    public function keranjang(){
    	return $this->hasMany('App\Keranjang','id_keranjang');
    }

    public function detail_pesanan(){
    	return $this->hasMany('App\Detail_pesanan','id_pelanggan');
    }

    public function transaksi(){
    	return $this->hasMany('App\Transaksi','id_pelanggan');
    }
}
