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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.tambah_karyawan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
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
        $user = User::find($id);
        return view('backend.admin.edit_karyawan',compact('user'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('dashboard');
    }
}
