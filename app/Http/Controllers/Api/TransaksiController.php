<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Master;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('transaksi.index',compact('tmp'));
    }

    public function create()
    {
        $master = Master::all();
        return view('transaksi.create',compact('master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaksi::create([
            'id_master'=>$request->id_master,
            'nama_apk'=>$request->nama_apk,
            'keterangan'=>$request->keterangan,
            'catatan'=>$request->catatan,
            'Lk'=>$request->Lk,
        ]);
        return redirect(route('trk.index'));
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
	    return view('transaksi.edit', compact('master'),['trk' => $trk]);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update([
            'id_master'=>$request->id_master,
            'nama_apk'=>$request->nama_apk,
            'keterangan'=>$request->keterangan,
            'catatan'=>$request->catatan,
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
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
