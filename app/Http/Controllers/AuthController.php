<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function postbackend(Request $request){
    	if (Auth::attempt($request->only('email','password'))) {
    		return redirect('dashboard');
    	}else{
    		return redirect('login-backend')->with('fail','gagal');
    	}
    }

    public function index(){
    	return view('backend.dashboard');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('login-backend');
    }
}
