@extends('layout.app')
@section('title', 'Data Kategori')


@section('content')

<!-- <h1>Data User</h1> -->
<div align="left">
    <a href="{{route('pinjam.create')}}" class="btn btn-primary mb-3">Tambah </a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Nama Anggota</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($datas as $key => $item)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->kode_transaksi}}</td>
                <td>{{$item->anggota->nama_anggota}}</td>
                <td>{{date('D, d-m-Y', strtotime($item->tgl_pinjam))}}</td>
                <td>{{date('D, d-m-Y', strtotime($item->tgl_kembali))}}</td>

                <td>
                    <a href="{{route('pinjam.edit', $item->id)}}" class="btn btn-primary mb-3">Detail</a>
                    <form class="d-inline" action="{{route('pinjam.destroy', $item->id)}}" method="post">
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