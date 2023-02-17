<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Master;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        
        $validation = Validator::make($request->all(), [
            'id_master'=> 'required',
            'nama_master'=>'required',
            'keterangan'=>'required',
        ],
            [
                'id_master.required'=>'Masukkan Data!',
                'nama_master.required'=>'Masukkan Data!',
                'keterangan.required'=>'Masukkan Data! apabila kosong tulis -',
            ]
        );
        if($validation->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validation->errors()
            ],401);

        } else {

            $post =  Master::create([
                'id_master'=>$request->id_master,
                'nama_master'=>$request->nama_master,
                'keterangan'=>$request->keterangan,
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 401);
            }
        }
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
        return response()
        ->json([
            'success' => true,
            'data' => $master
        ]);
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
        return response()
            ->json([
                'success' => true,
                'data' => $master
            ]);
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
            'success' => true,
            'status'=>200,
            'pesan'=>'data tidak diketahui '
        ]);
    }

    public function Yajra(Request $request){
        $query = Master::with(['badges'])->select(sprintf('%s.*', (new Master())->table));
        $table = Datatables::of($query);
        return $table->make(true);
    }
}
