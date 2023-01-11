<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:500" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('app.css')}}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    @include('header')
    <div class="collection-create-form">
        <form class="form" action="/collection/create" method="post">
            @csrf
            <label class="form-input-label" for="coll_name">NAME</label><br>
            <input class="form-input" type="text" id="coll_name" name="coll_name"><br>
            <input class="form-submit-button" type="submit" value="Create">
        </form>
    </div>
</body>
</html>
