<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>Judul</th>
            <th>ISBN</th>
            <th>Harga</th>
            <th>Penulis</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->isbn }}</td>
            <td>Rp {{ number_format($book->price, 0, ',', '.') }}</td>
            <td>{{ $book->author->name }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
