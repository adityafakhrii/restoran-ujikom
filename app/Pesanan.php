<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $fillable = ['id_pelanggan','total_bayar','keterangan','id_user'];

    public function pelanggan(){
    	return $this->belongsTo('App\Pelanggan','id_pelanggan');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    public function detail_pesanan(){
    	return $this->hasMany('App\Detail_pesanan','id_pesanan');
    }
}
