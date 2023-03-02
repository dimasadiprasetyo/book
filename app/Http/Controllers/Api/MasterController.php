<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MasterResource;
use App\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        
        $master = Master::latest()->get();
        return response()->json([
            'data' => MasterResource::collection($master),
            'message' => 'Fetch all posts',
            'success' => true
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kode = DB::table('masters')->max('id');
        $addNol = '';
    	$kode = str_replace("MS/", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

        
    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "MS".$addNol.$incrementKode;

        return response()->json([
            'data' => MasterResource::collection($kodeBaru),
            'message' => 'Fetch all posts',
            'success' => true
        ]);
       
    }
    
    public function read()
    {
       $Masters = Master::orderBy("id_master", "desc")->get();
       return response()->json([
           'Masters' => $Masters,
            'success' => true,
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
        
        $validator = Validator::make($request->all(), [
            'id_master'=> 'required',
            'nama_master'=>'required',
        ],
            [
                'id_master.required'=>'Masukkan Kode Aplikasi!',
                'nama_master.required'=>'Masukkan Nama Aplikasi!',
            ]);
            
            if ($validator -> fails())
            {
                return response()->json([
                    'status' =>400,
                    'errors'=>$validator->messages(),

                ]);
            }else{
                $master = new Master();
                $master->id_master = $request->input('id_master');
                $master->nama_master = $request->input('nama_master');
                $master->save();
                // Session::flash('sukses','Ini notifikasi SUKSES');
                return response()->json([
                    'success' => 200,
                    'message' => 'Post Berhasil Disimpan!',
                    'data' => $master
                ]);
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
        // return view('master.edit',compact('master'));
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

        $validator = Validator::make($request->all(), [
            'id_master'=> 'required',
            'nama_master'=>'required',
        ],
            [
                'id_master.required'=>'Masukkan Kode Aplikasi!',
                'nama_master.required'=>'Masukkan Nama Aplikasi!',
            ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $master = Master::find($id);
            $master->id_master = $request->id_master;
            $master->nama_master = $request->nama_master;
            $master->update();
            return response()
                ->json([
                    'success' =>200,
                    'data' => $master,'Data Berhasil Diupdate'
                ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $id = $request->post('id');

       $destroy = Master::find($id);
        if($destroy->delete()){
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully'; 
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

            return response()->json($response); 
    }
}
