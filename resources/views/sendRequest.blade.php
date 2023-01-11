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
    <div class="sent-request-container">
        @if (isset($response['error']))
            <p class="sent-request-error-name">ERROR</p>
            <p class="sent-request-error-value">{{$response['error']}}</p>
        @endif
        @if (isset($response['response']) && isset($response['info']))
            <p class="sent-request-field-name">STATUS CODE</p>
            <p class="sent-request-field-value">{{$response['info']['http_code']}}</p>
            <p class="sent-request-field-name">REQUEST SIZE</p>
            <p class="sent-request-field-value">{{$response['info']['request_size']}}</p>
            <p class="sent-request-field-name">REDIRECT COUNT</p>
            <p class="sent-request-field-value">{{$response['info']['redirect_count']}}</p>
            <p class="sent-request-field-name">CONTENT TYPE</p>
            <p class="sent-request-field-value">{{$response['info']['content_type']}}</p>
            <div class="request-response-box">
                <pre class="request-response-text">{{$response['response']}}</pre>
            </div>
        @endif
    </div>
</body>
</html>
