<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=jetbrains-mono:500" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('app.css')}}">
</head>
<body class="antialiased">
@include('header')
<div class="comments-container">
    <p class="comment-title">Comments</p>
    @foreach($comments as $comment)
        <div class="comment-box">
            <p class="comment-content">{{$comment}}</p>
        </div>
    @endforeach
</div>
</body>
</html>
