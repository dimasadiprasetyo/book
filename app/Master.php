<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $autoincrements = 'id';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id_master','nama_master','keterangan'];

    public function transaksi(){
        return  $this->hasMany('App\Transaksi','id','id_ts');
    }

    
}
