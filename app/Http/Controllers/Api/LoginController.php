<?php

namespace App\Http\Controllers\Api;

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
            // return redirect('/home')->with('success','Selamat! Anda telah berhasil Login');
            $auth = Auth::user();
            return response()->json([
                'error' => 400,
                'message' => 'Berhasil',
                'data' => $auth
            ]);
        }
            return response()->json([
                'error' => 202,
                'message' => 'gagal',
            ]);
            // return redirect('/')->with('message','Username atau Password salah');
    }

    public function logout(Request $request){
        $auth = Auth::logout();
        // return redirect('/');
        return response()->json([
            'error' => 400,
            'message' => 'Berhasil Logout',
            'data' => $auth
        ]);
    }
}
