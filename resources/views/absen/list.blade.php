@extends('layouts.app')

@section('content')
<?php
    $i = 1;
?>
    <div>
        <h1>Daftar Presensi untuk kegiatan: {{$kegiatan->nama}}</h1>
        @if(!$daftarHadir)
        <center>
            <h1>
                Belum ada peserta kegiatan yang melakukan absensi
            </h1>
        </center>
        @else
        <p>Jumlah peserta kegiatan yang hadir: <?php echo count($daftarHadir)?></p>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jenis Kelamin</th>
                <th>Unit atau Lembaga</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>No Hp</th>
                <th>Rdk</th>
                <th>Nomor Rekening BNI</th>
                <th>TTD</th>
            </thead>
            <tbody>
                @foreach ($daftarHadir as $item)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->nip}}</td>
                    <td><?php 
                        if ($item->jenis_kelamin == 1) {
                            # code...
                            echo "Pria";
                        } else {
                            # code...
                            echo "Wanita";
                        }
                        ?></td>
                    <td>{{$item->unit_or_lembaga}}</td>
                    <td>{{$item->jabatan}}</td>
                    <td>{{$item->golongan}}</td>
                    <td>{{$item->no_hp}}</td>
                    <td>{{$item->rdk}}</td>
                    <td>{{$item->no_rek}}</td>
                    <td><img src="{{url('/upload/'.$item->ttd_url)}}" alt="Image" width="100%" length="100%"/></td>
                    </tr>
                @endforeach
    
            </tbody>

        </table>

        @endif
    </div>
@endsection