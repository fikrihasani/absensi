@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/auth" method="post">
        @csrf
        <div class="form-group">
            <label for="">Email: </label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit">Login</button>
    </form>
</div>

@endsection