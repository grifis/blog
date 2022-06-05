<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'category_id',
        ];
    
    function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    function getPaginateByLimitOrder(string $option, int $limit_count = 5) 
    {
        if ($option == 'いいね更新順'){
            return $this::with('category')->orderBy('like_updated_at', 'DESC')->paginate($limit_count);
        }else if($option == "いいね順"){
            return $this::with('category')->orderBy('like', 'DESC')->paginate($limit_count);
        }else{
            return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        }
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
