<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genre</title>
</head>
<body>
    <h2>Hello</h2>
    <p>Selamat datang di halaman genre</p>

    @foreach ($genres as $g)
        <ul>
            <li>{{ $g['id'] }}</li>
            <li>{{ $g['name'] }}</li>
            <li>{{ $g['description'] }}</li>
        </ul>
    @endforeach
</body>
</html>
