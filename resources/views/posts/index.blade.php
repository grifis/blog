<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link rel="stylesheet" href="{{asset('/css/index.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class = "top-wrapper">
        <h1>雨の日わくわく掲示板</h1>
        </div>
        <!--今日の天気を表示してます。-->
        <div class = "weather">{{ $weather }}</div>
        <style>
        .word{
            color:red;
            font-style:italic;
        }
        </style>
        <div class = "word">
            <marquee scrollamount="100"><h2>{{ $knowledges->sentence }}</h2></marquee>
        </div>
        <form action = "/update" method="GET">
            <select name="update">
                <option name = "select" value="update">更新順</option>
                <option name = "select" value="like">いいね順</option>
            </select>
            <input type="submit" value="更新"/>
        </form>
        <h2>投稿一覧ページ</h2>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <h3 class='title'>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h3>
                    <p class='body'>本文：{{ $post->body}}</p>
                    <p>カテゴリー:<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                    <p><a href="/like/{{ $post->id }}">いいね</a>：{{ $post->like }}（最新のいいね：{{ $post->like_updated_at}}）</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}"  method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onClick="deletePost({{$post->id}});">削除</button> {{--script内に定義したdeletePostを使用している--}}
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div>
            [<a href='/posts/create'>新規作成</a>]
        </div>
    </body>
    <script>
        function deletePost(post_id) {
            form = document.getElementById('form_' + post_id);  //各投稿ごとのdeleteのformを取得
            is_submit = confirm('本当に削除してもよろしいですか？'); //はいの場合true,いいえの場合falseをis_submitに格納
            
            if(is_submit) {  //is_submitがtrueの場合のみ、{}の中の処理が行われる
                form.submit();  //deleteするformをsubmitする（投稿を削除している）
            }
        }
    </script>
</html>