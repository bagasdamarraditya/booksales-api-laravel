<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Author</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            color: #333;
            text-align: center;
            padding: 40px;
        }
        h1 {
            color: #457b9d;
            margin-bottom: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #a8dadc;
            margin: 8px 0;
            padding: 10px;
            border-radius: 5px;
            font-weight: 500;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background: #e63946;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
        }
        a:hover {
            background: #b51728;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Daftar Author</h1>
        <ul>
            @foreach ($authors as $author)
                <li>{{ $author['id'] }} — {{ $author['name'] }}</li>
            @endforeach
        </ul>
        <a href="/genres">Kembali ke Daftar Genre</a>
    </div>
</body>
</html>
