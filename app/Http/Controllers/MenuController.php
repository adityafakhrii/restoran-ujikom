<?php

namespace App\Http\Controllers;
use Session;
use App\Kategori;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('/');
        }else{
            $menus = Menu::all();
            return view('pelanggan.daftarmenu',compact('menus'));
        }
    }

    public function index_admin()
    {
        $menus = Menu::all();
        return view('backend.admin.daftarmenu_admin',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('backend.admin.tambah_menu',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
        $img = '';
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama = $gambar->getClientOriginalName();
            $gambar->move(public_path().'/img/',$nama);
            $img = '/img/'.$nama;
        }
        $menu->gambar = $img;
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->id_kategori = $request->id_kategori;
        $menu->status = $request->status;
        $menu->save();

        return redirect('daftarmenu-admin');
        
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
        $kategoris = Kategori::all();
        $menu = Menu::find($id);
        return view('backend.admin.edit_menu',compact('menu','kategoris'));
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
        $menu = Menu::find($id);
        $img = '';
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama = $gambar->getClientOriginalName();
            $gambar->move(public_path().'/img/',$nama);
            $img = '/img/'.$nama;
        }
        $menu->gambar = $img;
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->id_kategori = $request->id_kategori;
        $menu->status = $request->status;
        $menu->save();
        return redirect('daftarmenu-admin')->with('sukses-edit','berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('daftarmenu-admin')->with('sukses-hapus','sukses');
    }
}
