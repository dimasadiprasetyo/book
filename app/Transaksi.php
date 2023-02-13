<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $autoincrements = 'id_ts';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id_ts','id_master','nama_apk','keterangan','catatan','Lk'];

    public function master(){
        return $this->belongsTo('App\Master','id_ts','id');
    }
}
