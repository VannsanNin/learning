<!DOCTYPE html>
<html>
<head>
    <title>ABC Dictionary</title>

    <style>
        body {
            font-family: Arial;
            text-align: center;
        }

        .letters a {
            display: inline-block;
            padding: 15px;
            margin: 5px;
            background: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .letters a:hover {
            background: darkblue;
        }
    </style>
</head>
<body>

    <h1>ABC Dictionary</h1>

    <div class="letters">
        @foreach($letters as $letter)
            <a href="/{{ strtolower($letter) }}">
                {{ $letter }}
            </a>
        @endforeach
    </div>

</body>
</html>