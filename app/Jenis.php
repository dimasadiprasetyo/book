<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $autoincrements = 'id';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id','nama'];

    public function transaksi(){
        return  $this->hasMany('App\Transaksi','id','id_ts');
    }
}
