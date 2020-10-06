<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'news_category', 'content', 'image', 'author', 'created_date', 'visitor'];

    public function news_category(){
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }
}
