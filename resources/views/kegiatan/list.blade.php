@extends('layouts.app')

@section('content')
    <div>
        <div style="padding-bottom: 20px">
            <h1>Kegiatan</h1>
            <button class="btn btn-primary" onclick="window.location.href='/kegiatan/add'">Buat Kegiatan Baru</button>

        </div>
        @if ($exist)
            <?php $row = 1;?>
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Waktu</th>
                    <th>Sub Bagian</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$row++}}</td>
                            <td>
                                {{$item->nama}}
                            </td>
                            <td> {{$item->waktu}}</td>
                            <td><?php if($item->rdk){echo "RDK";}else{"Non RDK";} ?></td>
                            <td><a href="/absensi/add/{{$item->unique_id}}"><button class="btn btn-success">Absen</button></a></td>
                            <td><a href="/absensi/list/{{$item->id}}"><button class="btn btn-info">Lihat Presensi</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>   
        @else
            <center>
                <h2>Belum ada Kegiatan yang terdaftar</h2>
            </center>
        @endif

    </div>
@endsection