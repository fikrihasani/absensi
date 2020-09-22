@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/store" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama: </label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email: </label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit">Daftar</button>
    </form>
</div>

@endsection