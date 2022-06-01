<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable = ['id_pesanan','id_pelanggan','id_user','total_pembayaran','bayar','kembali','status'];

    public function pesanan(){
    	return $this->belongsTo('App\Pesanan','id_pesanan');
    }

    public function pelanggan(){
    	return $this->belongsTo('App\Pelanggan','id_pelanggan');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }
}
