<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarHadir extends Model
{
    //
    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class);
    }
}
