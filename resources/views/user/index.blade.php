@extends('layout.app')
@section('title', 'Data User')


@section('content')

<!-- <h1>Data User</h1> -->
<div align="left">
    <a href="{{route('user.create')}}" class="btn btn-primary mb-3">Tambah</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
            <tr>
                <td></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary mb-3">Edit</a>
                    <form action="{{route('user.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <!-- <input type="hidden" name="_method" value="delete"> -->
                        <button type="submit" class="btn btn-primary mb-3">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection