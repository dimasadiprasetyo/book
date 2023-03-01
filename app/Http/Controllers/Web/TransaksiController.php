<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Jenis;
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
        $tmp = Transaksi::orderBy('tgl','DESC')->with('master','jenis')->get();
        $ms = Master::all();
        $ms = Master::select('id', 'nama_master')->get();
        return view('transaksi.index',compact('tmp','ms'));
        return response()
        ->json([
            'success' => true,
            'data' => $ms,$tmp
        ]);
    }

    public function create()
    {
        $master = Master::all();
        $jenis = Jenis::all();
        return view('transaksi.create',compact('master','jenis'));
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
            ]
        );
        Transaksi::create([
            'id_master'=>$request->id_master,
            'id_nama'=>$request->id_nama,
            'tgl'=>$request->tgl,
            'Lk'=>$request->Lk,
        ]);
        return redirect(route('trk.index'));
        // return redirect()->to('trk.index');
      
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
        // $master = Master::all();
        $master = Master::select('id', 'nama_master')->get();
        $jenis = Jenis::select('id', 'nama')->get();
	    $trk = DB::table('transaksis')->where('id_ts',$id_ts)->get();
	    return view('transaksi.edit', compact('master','jenis'),['trk' => $trk]);
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
       
        // $transaksi->update($request->all());

        $transaksi = Transaksi::where('id_ts', $request->id_ts)
          ->update([
            'id_master'=>$request->id_master,
            'id_nama'=>$request->id_nama,
            'tgl'=>$request->tgl,
            'Lk'=>$request->Lk,
          ]);
        return redirect(route('trk.index'));
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
        return back();
    }   
}
