<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.bunny.net/css?family=jetbrains-mono:500" rel="stylesheet">
    <title>Laravel</title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="antialiased">
    @include('header')
    <div class="main-list-elements">
        @foreach ($collections as $coll)
            <div class="main-list-elem">
                <a class="main-element" href="/collection/{{$coll->id}}">Collection #{{$coll->name == null ? $coll->id : $coll->name}}</a>
                <a class="element-action" href="/collection/{{$coll->id}}/delete">Delete</a>
            </div>
        @endforeach
    </div>
    <div class="new-element-container">
        <div class="new-element">
            <a class="new-element-content" href="/collection/create">Create collection</a>
        </div>
    </div>
</body>
</html>
