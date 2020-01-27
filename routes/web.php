<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Pelanggan
Route::get('/', 'PelangganController@index');
Route::post('/postpelanggan','PelangganController@postpelanggan');
Route::get('/daftarmenu','MenuController@index');
Route::get('/home','PelangganController@home');
Route::get('/keranjang','KeranjangController@index');
Route::post('/tambah-keranjang/{id}','KeranjangController@store');

//Backend
Route::get('/login-backend', function() {
    if (Auth::check()){
        return redirect('/dashboard');
    }
    else{
        return view('backend.auth.login_backend');
    }
    })->name('login');

Route::get('/logout','AuthController@logout');
Route::post('/postbackend','AuthController@postbackend');

Route::group(['middleware' => ['auth','checkRole:admin,waiter,kasir']], function() {
	Route::get('/dashboard', 'AuthController@index');
	Route::get('/daftarmenu-admin', 'MenuController@index_admin');
	Route::get('/daftarmenu-admin/tambah', 'MenuController@create');
	Route::post('/daftarmenu-admin/store', 'MenuController@store');
	Route::get('/daftarmenu-admin/hapus/{id}', 'MenuController@destroy');
	Route::get('/daftarmenu-admin/edit/{id}', 'MenuController@edit');
	Route::post('/daftarmenu-admin/update/{id}', 'MenuController@update');

	Route::get('/waiter','WaiterController@index');

	Route::get('/kasir','KasirController@index');

	Route::get('/tambah-karyawan','UserController@create');
	Route::post('/tambah-karyawan/store','UserController@store');

	Route::get('/edit-karyawan/{id}','UserController@edit');
	Route::post('/update-karyawan/{id}','UserController@update');
	Route::get('/update-karyawan/{id}','UserController@update');
	Route::get('/hapus-karyawan/{id}','UserController@destroy');
});
