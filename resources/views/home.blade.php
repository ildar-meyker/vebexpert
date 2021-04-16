<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        
        <form method="POST"
            action="/create-pdf"
            enctype="multipart/form-data"
            target="_blank" id="app">

            {{ csrf_field() }}

            <app></app>
        </form>   

        <script src="{{ mix('/js/app.js') }}"></script>

    </body>
</html>
