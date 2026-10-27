<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Author</title>
</head>

<body>
    <h1>Daftar Author</h1>
    <p>Selamat datang di halaman author</p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Bio</th>
        </tr>
        @foreach ($authors as $a)
            <tr>
                <td>{{ $a['id'] }}</td>
                <td>{{ $a['name'] }}</td>
                <td>{{ $a['photo'] }}</td>
                <td>{{ $a['bio'] }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
