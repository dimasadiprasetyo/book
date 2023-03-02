<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_ts' => $this->id_ts,
            'keterangan' => $this->keterangan,
            'tgl' => $this->tgl,
            'Lk' => $this->Lk,
            'id_nama' => $this->id_nama,
            'id_master' => $this->id_master,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
        ];
    }
}
