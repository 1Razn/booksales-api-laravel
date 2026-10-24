<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Author</title>
</head>
<body>
    <h2>Hello</h2>
    <p>Selamat datang di halaman author</p>

    @foreach ($authors as $a)
        <ul>
            <li>{{ $a['id'] }}</li>
            <li>{{ $a['name'] }}</li>
            <li>{{ $a['photo'] }}</li>
            <li>{{ $a['bio'] }}</li>
        </ul>
    @endforeach
</body>
</html>
