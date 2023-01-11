<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:500" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="antialiased">
    @include('header')
    <div class="main-list-elements">
        @foreach($reqs as $request)
            <div class="main-list-elem">
                <a class="main-element" href="/request/{{$request->id}}">Request #{{$request->name == null ? $request->id : $request->name}}</a>
                <a class="element-action" href="/request/{{$request->id}}/delete">Delete</a>
            </div>
       @endforeach
    </div>
    <div class="new-element-container">
        <div class="new-element">
            <a class="new-element-content" href="/request/create">Create request</a>
        </div>
    </div>
</body>
</html>
