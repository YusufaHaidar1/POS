<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
    </head>
    <body class="antialiased">
        <h2>ID Anda {{$id}}</h2>
        <h3>Nama Anda {{$nama}}</h3>
    </body>
</html>
