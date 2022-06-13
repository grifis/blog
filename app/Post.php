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
        return $this::with('category')->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    function getPaginateByLimitLike(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('like', 'DESC')->paginate($limit_count);
    }
    
    function getPaginateByLimitUpdate(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function like(){
        return $this->hasOne('App\Like');
    }
}
