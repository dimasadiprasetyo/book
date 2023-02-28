<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('user.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }


    
    public function store(Request $request)
    {
        $pengguna = User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'level'=>$request->level,
            'password'=> (new BcryptHasher())->make($request->password),
            'api_token'=> (new BcryptHasher())->make($request->username),
        ]);
        if($pengguna) {
            return response()->json([
                'success' => true,
                'pengguna'    => $pengguna,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }

    public function read(Request $request)
    {
        $Usr = User::all();
       
       return response()->json([
           'Usr' => $Usr,
       ]);
    }

    public function editpas()
    {
        return view('user.editpas');
    }
    

    public function updateuser(UpdatePasswordRequest $request, User $user)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json([
            'status'=>200,
            'pesan'=>'data tidak diketahui '
        ]);
    }
}
