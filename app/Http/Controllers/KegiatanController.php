<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    //
    public function index()
    {
        $data = Kegiatan::get();
        $exist = true;
        if (!$data) {
            $exist = false;
        }
        return view('kegiatan.list', ['data' => $data, 'exist' => $exist]);
    }

    public function add()
    {
        return view('kegiatan/create');
    }

    public function store(Request $request)
    {
        $table = new Kegiatan();
        $this->validate($request, [
            'nama' => 'required',
            'waktu' => 'required',
        ]);
        $table->nama = $request->nama;
        $table->waktu = $request->waktu;
        $table->rdk = $request->rdk == '1' ? True : False;
        $table->unique_id = Str::random(20);
        if ($table->save()) {
            # code...
            return redirect('/kegiatan')->with('success', 'kegiatan berhasil ditambahkan');
        }
    }
}
