<!DOCTYPE HTML>
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
                    <h2 class="home-content">Post your episode in the sunny day.</h2>
                </div>
                </header>
            </div><!-- /.home-content -->
        </div><!-- /#home -->
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="Episode title" value="{{ old('post.title') }}"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="Your episode in the rainy day.">{{ old('post.body') }}</textarea>
            </div>
            <input type="hidden" name="post[weather_id]" value="{{ $weather->id }}"/>
            <input type="hidden" name="post[category_id]" value="1"/>
            <input type="submit" value="Save"/>
        </form>
        <button onclick="location.href='/weathers/rainy/1'">Back</button>
        <footer>
            <div class="wrapper">
            <P><small>&copy;  2022 TeamCreate</small></p>
            </div>
        </footer>
    </body>
</html>