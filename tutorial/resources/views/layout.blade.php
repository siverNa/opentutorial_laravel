<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Laravel')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    </head>
    <body>
        <ul>
            <li><a href="/">Welcome</a></li>
            <li><a href="/contact">contact</a></li>
            <li><a href="/hello">hello</a></li>
        </ul>
        <h1>@yield('content')</h1>
    </body>
</html>
