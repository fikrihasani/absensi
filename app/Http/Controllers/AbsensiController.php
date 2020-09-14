<?php

namespace App\Http\Controllers;

use App\DaftarHadir;
use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
class AbsensiController extends Controller
{
    //
    public function index()
    {
        $data = DaftarHadir::all();
        return view('absen.list', ['data' => $data]);
    }

    public function add($id_kegiatan)
    {
        $kegiatan = Kegiatan::where('unique_id',$id_kegiatan)->first();
        return view('absen.create', ['kegiatan' => $kegiatan]);
    }

    public function list($id){
        $kegiatan = Kegiatan::find($id);
        $daftarHadir = DaftarHadir::where('kegiatan_id',$id)->get();
        return view('absen.list', ['daftarHadir' => $daftarHadir, 'kegiatan'=>$kegiatan]);
    }

    public function store(Request $request)
    {
        $table = new DaftarHadir();
        $table->nama = $request->nama;
        $table->nip = $request->nip;
        $table->jenis_kelamin = $request->jenis_kelamin;
        $table->unit_or_lembaga = $request->unit_or_lembaga;
        $table->jabatan = $request->jabatan;
        $table->golongan = $request->golongan;
        $table->no_hp = $request->no_hp;
        $table->rdk = $request->rdk == '1' ? True : False;
        $table->no_rek = $request->no_rek;
        $table->kegiatan_id = $request->kegiatan_id;

        // ttd
        $folderPath = public_path('upload/');

        $image_parts = explode(";base64,", $request->signed);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $filename = $request->kegiatan_id . $request->nama . $request->nip.'.' . $image_type;
        $file = $folderPath . $filename;
        file_put_contents($file, $image_base64);

        $table->ttd_url = $filename;
        if ($table->save()) {
            # code...
            return "data saved";
        }
    }
}
