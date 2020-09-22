@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($kegiatan as $k)
        <b>{{$k->nama}}</b>
    @endforeach
</div>    
@endsection