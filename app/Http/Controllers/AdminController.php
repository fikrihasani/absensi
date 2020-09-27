<?php

namespace App\Http\Controllers;

use App\DaftarHadir;
use App\Kegiatan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(){
        if (Auth::check()) {
            $k = Kegiatan::with('daftarHadir')->get();
            return view('admin.index',['kegiatan'=>$k]);
            # code...
        }else{
            return redirect('/login');
        }
    }

    public function detail($id){
        if (Auth::check()) {
            $k = Kegiatan::with('daftarHadir')->where('id',$id)->first();
            return view('admin.detail',['kegiatan'=>$k]);
        }else{
            return redirect('/login');
        }
    }

    public function printPDF($id){
        $k = Kegiatan::with('daftarHadir')->where('id',$id)->first();
        view()->share('k',$k);
        $pdf = PDF::loadView('pdf_view',$k);
        return $pdf->download('absensi.pdf');
    }
}
