@extends('layout.app')
@section('title', 'Data Kategori')


@section('content')

<!-- <h1>Data User</h1> -->
<div align="left">
    <a href="{{route('pinjam.create')}}" class="btn btn-primary mb-3">Tambah Kategori</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($datas as $item)
            <tr>
                <td></td>
                <td>{{$item->category_name}}</td>
                <td>
                    <a href="{{route('category.edit', $item->id)}}" class="btn btn-primary mb-3">Edit</a>
                    <form action="{{route('category.destroy', $item->id)}}" method="post">
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