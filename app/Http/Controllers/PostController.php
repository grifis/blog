<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
// use App\Category;

class PostController extends Controller
{
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/');
    }
    
    public function page_change(Post $post){
        $count_rainy = Post::where('weather_id',1)->count();
        $count_sunny = Post::where('weather_id',2)->count();
        
        if($count_rainy-$count_sunny>3){
            return view('home3');
        }
        elseif($count_rainy-$count_sunny>2){
            return view('home2');
        }
        else{
            return view('home1');
        }
    }
}
