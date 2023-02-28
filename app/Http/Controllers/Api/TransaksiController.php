<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Master;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tmp = Transaksi::with('master')->get();
        $ms = Master::all();
        $ms = Master::select('id', 'nama_master')->get();
        // return view('transaksi.index',compact('tmp','ms'));
        return response()
        ->json([
            'success' => true,
            'data' => $ms,$tmp
        ]);
    }

    public function create()
    {
        $master = Master::all();
        // return view('transaksi.create',compact('master'));
        return response()
        ->json([
            'success' => true,
            'data' => $master
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'id_master'=> 'required',
            'keterangan'=>'required',
            'Lk'=>'required',
        ],
            [
                'id_master.required'=>'Masukkan Data!',
                'keterangan.required'=>'Masukkan Data! apabila kosong tulis -',
                'Lk.required'=>'Masukkan Data! apabila kosong tulis -',
            ]
        );
        if($validation->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validation->errors()
            ],401);

        }else{
            $post = Transaksi::create([
                'id_master'=>$request->id_master,
                'keterangan'=>$request->keterangan,
                'tgl'=>$request->tgl,
                'Lk'=>$request->Lk,
            ]);
            // return redirect(route('trk.index'));
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                    'data' => $post
                ], 200);
            }
        }

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id_ts)
    {
        // dd($trk);
        $master = Master::all();
	    $trk = DB::table('transaksis')->where('id_ts',$id_ts)->get();
        return response()
        ->json([
            'success' => true,
            'data' => $master,$trk
        ]);
	    
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $transaksi = Transaksi::where('id_ts', $request->id_ts)
          ->update([
            'id_master'=>$request->id_master,
            'keterangan'=>$request->keterangan,
            'tgl'=>$request->tgl,
            'Lk'=>$request->Lk,
          ]);
          return response()
            ->json([
                'success' => true,
                'data' => $transaksi
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi,$id_ts)
    {
        $res=Transaksi::where('id_ts',$id_ts)->delete();
        return response()->json([
            'success' => true,
            'status'=>200,
            'pesan'=>'data diketahui ',
            'data' => $res
        ]);
    }   
}
