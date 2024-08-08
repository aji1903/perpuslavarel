@extends('layout.app')
@section('title', 'Data Kategori')


@section('content')

<!-- <h1>Data User</h1> -->
<div align="left">
    <a href="{{route('books.create')}}" class="btn btn-primary mb-3">Tambah </a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Penulis</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($datas as $key => $item)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->category->category_name}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->penerbit}}</td>
                <td>{{$item->tahun_terbit}}</td>
                <td>{{$item->penulis}}</td>
                <td>
                    <a href="{{route('books.edit', $item->id)}}" class="btn btn-primary mb-3">Edit</a>
                    <form action="{{route('books.destroy', $item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <!-- <input type="hidden" name="_method" value="delete"> -->
                        <button class='btn btn-primary mb-3' type="submit">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection