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
                        @foreach ($requests as $req)
                            <div class="main-list-elem">
                                <a class="main-element" href="/request/{{$req->id}}">Request #{{$req->name == null ? $req->id : $req->name}}</a>
                                <a class="element-action" href="/collection/{{$collection->id}}/request/{{$req->id}}/remove">Remove</a>
                            </div>
                        @endforeach
                    </div>
        <div class="form-container">
            <form class="form-select" action="/collection/{{$collection->id}}/request/add" method="post">
                @csrf
                <select class="request-select" name="selected_request">
                    @foreach($neutralRequests as $nReq)
                        <option class="request-option" value="{{$nReq->id}}">
                            Request #{{$nReq->name ?? $nReq->id}}
                        </option>
                    @endforeach
                </select>
                <button class="form-submit-button" type="submit">Add</button>
        </form>
        </div>
    </div>
</body>
</html>
