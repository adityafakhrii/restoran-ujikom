<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjangs';
    protected $fillable = ['id_pelanggan','id_menu'];

    public function pelanggan(){
    	return $this->belongsTo('App\Pelanggan','id_pelanggan');
    }

    public function menu(){
    	return $this->belongsTo('App\Menu','id_menu');
    }
}
