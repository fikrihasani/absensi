<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDO;

class KegiatanController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $data = Kegiatan::get();
            $exist = true;
            if (!$data) {
                $exist = false;
            }
            return view('kegiatan.list', ['data' => $data, 'exist' => $exist]);
            # code...
        }else{
            return redirect('/login');
        }
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
