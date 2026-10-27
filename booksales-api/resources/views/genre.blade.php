<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genre</title>
</head>

<body>
    <h1>Daftar Genre</h1>
    <p>Selamat datang di halaman genre</p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($genres as $g)
            <tr>
                <td>{{ $g['id'] }}</td>
                <td>{{ $g['name'] }}</td>
                <td>{{ $g['description'] }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
