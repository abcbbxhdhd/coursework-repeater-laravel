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
    <div class="request-details">
        <p class="request-detail-name"></p>
        <p class="request-detail-value">{{$req->method}} HTTP/1.1</p>
        <p class="request-detail-name">URL</p>
        <p class="request-detail-value">{{$req->url}}</p>
        <div class="request-detail-box">
            <p class="request-detail-name">HEADER</p>
            @if (!empty($headerOut))
                @foreach ($headerOut as $header)
                    <p class="request-detail-value">{{$header}}</p>
                @endforeach
            @endif
        </div>
        <p class="request-detail-name">COOKIES</p>
        @if (strlen($cookiesOut) != 0)
            <p class="request-detail-value">{{$cookiesOut}}</p>
        @endif
        <p class="request-detail-name">DATA</p>
        @if (strlen($dataOut) != 0)
            <p class="request-detail-value">{{$dataOut}}</p>
        @endif
        <div class="new-element-container">
            <div class="new-element">
                <a class="new-element-content" href="/request/{{$req->id}}/send">Send request</a>
            </div>
            <div class="new-element">
                <a class="new-element-content" href="/request/{{$req->id}}/find-hidden-comments">Find comments</a>
            </div>
        </div>
    </div>
</body>
</html>
