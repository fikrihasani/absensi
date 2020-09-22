@extends('layouts.nonavbar')

@section('content')
    <div>
        <h1>
            Absensi
        </h1>
        <div class="alert alert-info" role="alert">
            <ul>
                <li>Kegiatan: {{$kegiatan->nama}}</li>
                <li>Waktu kegiatan: {{$kegiatan->waktu}}</li>
            </ul>
        </div>
        <div style="margin-top:20px">
            <form method="post" action="/absensi/store">
    
                <!-- CROSS Site Request Forgery Protection -->
                @csrf
    
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" id="nip">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Pria</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="2">
                        <label class="form-check-label" for="inlineRadio2">Wanita</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Unit/Lembaga</label>
                    <input class="form-control" type="text" name="unit_or_lembaga" id="unit_or_lembaga">
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Golongan</label>
                    <input type="text" class="form-control" name="golongan" id="golongan">
                </div>
                <div class="form-group">
                    <label for="">Nomor Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control">
                </div>
                @if ($kegiatan->rdk)
                <div class="form-group">
                    <label for="">RDK</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rdk" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Iya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rdk" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Tidak</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nomor Rekening BNI</label>
                    <input type="text" name="no_rek" id="no_rek" class="form-control">
                </div>
                @endif
                <div class="form-group">
                    <label class="" for="">Tanda Tangan</label>
                    <br/>
                    <div id="sig" ></div>
                    <br/>
                    <button id="clear" class="btn btn-danger btn-sm">Hapus TTD</button>
                    <textarea id="signature64" name="signed" style="display: none"></textarea>
                </div>
                <input type="hidden" name="kegiatan_id" value="{{$kegiatan->id}}">
                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </form>

        </div>


    </div>
    <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
@endsection