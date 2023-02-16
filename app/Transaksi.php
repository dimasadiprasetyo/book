<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $autoincrements = 'id_ts';
    protected $primarykey = 'id_ts';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id_master','nama_apk','keterangan','catatan','Lk'];

    public function master(){
        return $this->belongsTo('App\Master','id_master')->withDefault([
            'id_master'=>'nama_apk'
        ]);
    }
}
