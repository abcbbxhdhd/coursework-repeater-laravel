<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:500" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="antialiased">
    @include('header')
    <div class="form-container">
        <form class="form" action="/request/create" method="post">
            @csrf
            <label class="form-input-label" for="method">METHOD</label><br>
            <input class="form-input" type="text" id="method" name="method"><br>
            <label class="form-input-label" for="url">URL</label><br>
            <input class="form-input" type="text" id="url" name="url"><br>
            <label class="form-input-label" for="headers">HEADERS</label><br>
            <textarea class="form-textarea" id="headers" name="headers"></textarea><br>
            <label class="form-input-label" for="cookies">COOKIES</label><br>
            <input class="form-input" type="text" id="cookies" name="cookies"><br>
            <label class="form-input-label" for="data">DATA</label><br>
            <input class="form-input" type="text" id="data" name="data"><br>
            <input class="form-submit-button" type="submit" value="Create">
        </form>
    </div>
</body>
</html>
