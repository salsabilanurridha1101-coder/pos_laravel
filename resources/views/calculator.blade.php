<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Calculator</h1>
    <form action="{{route('calculator.store')}}" method="post">
        @csrf
        <label for="">Nilai 1</label><br>
        <input type="number" name="nilai1" id=""><br><br>

        <select name="simbol" id="" required>
            <option value=""></option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="+">+</option>
            <option value="-">-</option>
        </select><br><br>

        <label for="">Nilai 2</label><br>
        <input type="number" name="nilai2" id=""><br><br>
        <button type="submit">Hitung</button>
    </form>

    <p>{{$hasil ?? 0}}</p>
</body>

</html>
