<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アプリ名</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <div id="home" class="big-bg">
            <div class="page-select">
                <header class="page-header wrapper">
                    <nev>
                        <ul class="link-select">
                            <li><a href="/weathers/rainy/1">Rainy</a></li>
                            <li><a href="/weathers/sunny/2">Sunny</a></li>
                        </ul>
                    </nev>
                <div class="home-content wrapper">
                    <h2 class="home-content">Hana-kappa</h2>
                </div>
                </header>
            </div><!-- /.home-content -->
        </div><!-- /#home -->
        <div class='image3'>
            <img src="./image/flower_seichou8.png">
        </div>
        <footer>
            <div class="wrapper">
            <P><small>&copy;  2022 TeamCreate</small></p>
            </div>
        </footer>
    </body>
</html>