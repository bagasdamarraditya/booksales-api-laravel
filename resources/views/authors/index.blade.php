<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Penulis</title>
</head>
<body>
    <h1>Daftar Penulis</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Bio</th>
        </tr>
        @foreach ($authors as $author)
        <tr>
            <td>{{ $author->name }}</td>
            <td>{{ $author->email }}</td>
            <td>{{ $author->bio }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
