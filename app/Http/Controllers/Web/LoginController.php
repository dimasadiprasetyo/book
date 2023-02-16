<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request , User $user){
        $ingat = $request->remember ? true : false;
        // $up = $request->only('username','password');

        if (Auth::attempt($request->only('username', 'password'),$ingat)) {
            return redirect('/home')->with('success','Selamat! Anda telah berhasil Login');
        }
            return redirect('/')->with('message','Username atau Password salah');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
