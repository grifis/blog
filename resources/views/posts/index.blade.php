<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>大喜利</h1>
        <h2>お題一覧</h2>
        <div>
            [<a href='/posts/create'>新規作成</a>]
        </div>
        <div class='posts'>
            @foreach($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h>
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