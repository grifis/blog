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
                            <li><a href="/weathers/sunny/2">Sunny</a></li>
                            <li><a href="/weathers/rainy/1/posts/create">Create</a></li>
                        </ul>
                    </nev>
                <div class="home-content wrapper">
                    <h2 class="home-content">Episode in the rainy day.</h2>
                </div>
                </header>
            </div><!-- /.home-content -->
        </div><!-- /#home -->
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h3 class='title'>{{ $post->title }}</h2>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <footer>
            <div class="wrapper">
            <P><small>&copy;  2022 TeamCreate</small></p>
            </div>
        </footer>
    </body>
</html>