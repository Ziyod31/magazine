<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/js/app.js"></script>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/template.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        @include('inc.nav')
    </nav>

    <div class="container">
        <div class="starter-template">
            @if(session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
            @elseif(session()->has('warning'))
            <p class="alert alert-danger">{{ session()->get('warning') }}</p>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>
