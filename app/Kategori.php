<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama_kat'];

    public function menu(){
    	return $this->hasMany('App\Menu','id_kategori');
    }

}
