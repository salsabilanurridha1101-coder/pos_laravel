<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Tambah</title>
</head>

<body>
    <form action="{{route('storeKali')}}" method="post">
        @csrf
        <label for="">Angka 1</label>
        <input type="text" placeholder="Masukkan Angka" name="angka1">
        <br><br>

        <label for="">Angka 2</label>
        <input type="text" placeholder="Masukkan Angka" name="angka2">
        <br><br>

        <button type="submit">Simpan</button>

        <p>Hasilnya adalah : <strong>{{ $jumlah ?? 0 }}</strong></p>
    </form>
</body>

</html>
