<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'laravel')</title>
</head>
<body>
    <ul>
        <li><a href="/">welcome</a></li>
        <li><a href="/hello">hello</a></li>
        <li><a href="/contact">contact</a></li>
    </ul>
    @yield('content')
</body>
</html>
