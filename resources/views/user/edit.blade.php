@extends('layout.app')
@section('title', 'Tambah')

@section('content')
<form action="{{route('user.update', $edit->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nama Lengkap</label>
        <input class="form-control" type="text" name="name" value="{{$edit->name}}">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="email" name="email" value="{{$edit->email}}">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input class="form-control" type="password" name="password">
    </div>
    <div class="form-group">
        <button class="btn btn-primary mb-3" type="submit">Simpan</button>
        <a href="{{url()->previous()}}" class="btn btn-primary mb-3">Kembali</a>
    </div>
</form>
@endsection