<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return view('master.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       return view('master.create');
    }
    
    public function read()
    {
       $Masters = Master::orderBy("id_master", "desc")->get();
       
       return response()->json([
           'Masters' => $Masters,
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
        
        Master::create([
            'id_master'=>$request->id_master,
            'nama_master'=>$request->nama_master,
            'keterangan'=>$request->keterangan,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $master = Master::find($id);
        return view('master.edit',compact('master'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master,$id)
    {
        $master = Master::find($id);
        $master->id_master = $request->id_master;
        $master->nama_master = $request->nama_master;
        $master->keterangan = $request->keterangan;
        $master->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Master::destroy($id);
        return response()->json([
            'status'=>200,
            'pesan'=>'data tidak diketahui '
        ]);
    }
}
