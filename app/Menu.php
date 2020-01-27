<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['nama_menu','harga','id_kategori','status'];

    public function kategori(){
    	return $this->belongsTo('App\Kategori','id_kategori');
    }

    public function detail_pesanan(){
    	return $this->hasMany('App\Detail_pesanan','id_pesanan');
    }

}
