<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
    public function daftarHadir(){
        return $this->hasMany(DaftarHadir::class);
    }
}
