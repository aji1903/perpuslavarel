@extends('layout.app')
@section('title', 'Tambah Books')

@section('content')
<form action="{{route('books.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Kategori Buku</label>
        <select name="category_id" id="" class="form-control">
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Judul</label>
        <input class='form-control' type="text" name="judul">
    </div>
    <div class="form-group">
        <label for="">Jumlah</label>
        <input class='form-control' type="number" name="jumlah">
    </div>
    <div class="form-group">
        <label for="">Penerbit</label>
        <input class='form-control' type="text" name="penerbit">
    </div>
    <div class="form-group">
        <label for="">Tahun Terbit</label>
        <input class='form-control' type="text" name="tahun_terbit">
    </div>
    <div class="form-group">
        <label for="">Penulis</label>
        <input class='form-control' type="text" name="penulis">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
    </div>
</form>
@endsection