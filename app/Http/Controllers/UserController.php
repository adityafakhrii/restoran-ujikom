<?php

namespace App\Http\Controllers;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('backend.admin.tambah_karyawan');
    }

    
    public function store(Request $request)
    {
        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        if ($request->role == 'waiter') {
            return redirect('/waiter');
        }elseif ($request->role == 'kasir') {
            return redirect('/kasir');
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.admin.edit_karyawan',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $img = '';
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama = $foto->getClientOriginalName();
            $foto->move(public_path().'/img/',$nama);
            $img = '/img/'.$nama;
        }
        $user->foto = $img;
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        if ($request->role == 'waiter') {
            return redirect('/waiter');
        }elseif ($request->role == 'kasir') {
            return redirect('/kasir');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('dashboard');
    }
    
}
