<form action="{{route('store_tambah')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Angka1</label>
        <input type="text" name="angka1">
    </div>
    <div class="form-group">
        <label for="">Angka2</label>
        <input type="text" name="angka2">
    </div>
    <div class="form-group">
        <button type="submit">Tambah</button>

    </div>
</form>
<h1>Jumlahnya adalah : {{$jumlah}}</h1>