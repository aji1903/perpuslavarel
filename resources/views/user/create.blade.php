@extends('layout.app')
@section('title', 'Tambah')

@section('content')

<form action="{{route('user.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Nama Lengkap</label>
        <input class="form-control" type="text" name="name">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="email" name="email">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input class="form-control" type="password" name="password">
    </div>
    <div class="form-group">
        <button class='btn btn-primary' type="submit">Simpan</button>
        <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
    </div>
</form>
@endsection