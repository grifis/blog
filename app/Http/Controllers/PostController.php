<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Comment;
use App\Knowledge;
use App\Like;

class PostController extends Controller
{
    public function index(Post $post, Knowledge $knowledge)
    {

        $knowledge_weather = new Knowledge();
        
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = "https://api.openweathermap.org/data/2.5/onecall?lat=35.681236&lon=139.767125&units=metric&lang=ja&appid=b189686c28f3ce7905dca1b79969a9f1";

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.OpenWeatherMap.token')]
        );
        
        $questions = json_decode($response->getBody(), true);
        $weather = $questions['current']['weather'][0]['description'];
        //dd($weather);
        
        if(strpos($weather,'晴') == true){
            $knowledge_weather = $knowledge->whereIn('weather',[0])->get(); //晴れ＝0
        }else if(strpos($weather,'曇') == true or strpos($weather,'雲') == true){
            $knowledge_weather = $knowledge->whereIn('weather',[1])->get(); //曇り=1
        }else if(strpos($weather,'雨') == true){
            $knowledge_weather = $knowledge->whereIn('weather',[2])->get(); //雨=2
        }else{
            $knowledge_weather = $knowledge->whereIn('weather',[3])->get(); //その他=3
        }
        //dd($knowledge_weather);
        
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'weather' => $weather,
            'knowledges' => $knowledge_weather->random()
        ]);
        
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->like = 0;
        $post->like_updated_at = now();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function order(Request $request, Post $post, Knowledge $knowledge)
    {
        //dd($request->input('update'));
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = "https://api.openweathermap.org/data/2.5/onecall?lat=35.681236&lon=139.767125&units=metric&lang=ja&appid=b189686c28f3ce7905dca1b79969a9f1";

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.OpenWeatherMap.token')]
        );
        
        $questions = json_decode($response->getBody(), true);
        $weather = $questions['current']['weather'][0]['description'];
        
        if($request->input('update') == 'like'){
            return view('posts/index')->with(['posts' => $post->getPaginateByLimitLike(), 'weather'=>$weather, 'knowledges' => $knowledge->random()]);
        }else if($request->input('update') == 'update'){
            return view('posts/index')->with(['posts' => $post->getPaginateByLimitUpdate(), 'weather'=>$weather, 'knowledges' => $knowledge->random()]);
        }
    }
    
    public function like(Post $post, Knowledge $knowledge)
    {
        $post->increment('like');
        $post->save();
          
        return redirect('/');
        
    }
}
