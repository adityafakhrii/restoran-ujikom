<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_pesanan extends Model
{
    protected $table = 'detail_pesanans';
    protected $fillable = ['id_pesanan','id_menu','id_pelanggan','jumlah','total_harga','status'];

    public function pesanan(){
    	return $this->belongsTo('App\Pesanan','id_pesanan');
    }

    public function menu(){
    	return $this->belongsTo('App\Menu','id_menu');
    }

    public function pelanggan(){
    	return $this->belongsTo('App\Pelanggan','id_pelanggan');
    }

    
}
