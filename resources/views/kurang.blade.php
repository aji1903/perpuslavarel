<form action="{{route('store_kurang')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Masukkan Nilai</label>
        <input type="text" name="angka1">
    </div>
    <div class="form-group">
        <label for="">Masukkan Nilai</label>
        <input type="text" name="angka2">
    </div>
    <div class="form-group">
        <button type="submit">Kurang</button>

    </div>
</form>
<h1>Jumlahnya adalah : {{$jumlah}}</h1>