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

        <header>
            <div class="wrapper clearfix">
                <a class="float-left" href="https://vebexpert.ru">
                    <img class="header__logo" alt="vebexpert logo" src="https://static.tildacdn.com/tild3664-3263-4031-b239-393035636664/logo.png">
                </a>
                <a href="#" class="header__button">
                    Подать клинический случай
                </a>
            </div>
        </header>
        
        <form method="POST"
            action="/create-pdf"
            enctype="multipart/form-data"
            target="_blank" id="app">

            {{ csrf_field() }}

            <app></app>
        </form>   

        <footer class="footer">
            <div class="wrapper">
                <a href="https://vebexpert.ru">
                    <img src="https://thumb.tildacdn.com/tild3738-3631-4235-b062-386566363463/-/resize/240x/-/format/webp/logo_2.png" alt="vebexpert logo" class="footer__logo">
                </a>
                <div class="footer__text">© 2020</div>
            </div>
        </footer>

        <script src="{{ mix('/js/app.js') }}"></script>

    </body>
</html>
