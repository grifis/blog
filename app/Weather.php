<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    protected $table="weathers"; // これがないとweathersテーブルを参照できなかったので追加
    
    // public function getByCategory(int $limit_count = 5)
    // {
    //      return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    // }
}
