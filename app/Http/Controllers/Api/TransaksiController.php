<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResource;
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
        return response()->json([
            'data' => TransaksiResource::collection($tmp, $ms),
            'message' => 'Fetch all posts',
            'success' => true
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
            'id_nama'=>'required',
            'tgl'=>'required',
            'Lk'=>'required',
        ],
            [
                'id_master.required'=>'Masukkan Data!',
                'id_nama.required'=>'Masukkan Data! apabila kosong tulis -',
                'tgl.required'=>'Masukkan Data! apabila kosong tulis -',
                'Lk.required'=>'Masukkan Data! apabila kosong tulis -',
            ]);
            if ($validation -> fails()){
                return response()->json([
                    'status' =>400,
                    'errors'=>$validation->messages(),
                ]);
            }else{
                $transaksi = new Transaksi();
                $transaksi->id_master = $request->input('id_master');
                $transaksi->id_nama = $request->input('id_nama');
                $transaksi->tgl = $request->input('tgl');
                $transaksi->Lk = $request->input('Lk');
                return response()->json([
                    'success' => 200,
                    'message' => 'Post Berhasil Disimpan!',
                    'data' => $transaksi
                ]);
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
            'data' => $trk
        ]);
	    
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master,$id)
    {

        $validation = Validator::make($request->all(), [
            'id_master'=> 'required',
            'id_nama'=>'required',
            'tgl'=>'required',
            'Lk'=>'required',
        ],
            [
                'id_master.required'=>'Masukkan Data!',
                'id_nama.required'=>'Masukkan Data! apabila kosong tulis -',
                'tgl.required'=>'Masukkan Data! apabila kosong tulis -',
                'Lk.required'=>'Masukkan Data! apabila kosong tulis -',
            ]);
        if ($validation -> fails()){
            return response()->json([
                'status' =>400,
                'errors'=>$validation->messages(),
            ]);
        }else{
            $transaksi = new Transaksi();
            $transaksi->id_master = $request->input('id_master');
            $transaksi->id_nama = $request->input('id_nama');
            $transaksi->tgl = $request->input('tgl');
            $transaksi->Lk = $request->input('Lk');
            return response()->json([
                'success' => 200,
                'message' => 'Post Berhasil Disimpan!',
                'data' => $transaksi
            ]);
        }
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
