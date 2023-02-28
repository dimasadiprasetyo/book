<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $autoincrements = 'id_ts';
    protected $primarykey = 'id_ts';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id_master','id_nama','Lk','tgl'];

    public function master(){
        return $this->belongsTo('App\Master','id_master')->withDefault([
            'id_master'=>'nama_apk'
        ]);
    }
    public function jenis(){
        return $this->belongsTo('App\Jenis','id_nama')->withDefault([
            'id_nama'=>'nama'
        ]);
    }
}
