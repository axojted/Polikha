<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @include('essential.css')
    <title>Document</title>
</head>
<body>
    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
    @include('essential.js')
</body>
</html>