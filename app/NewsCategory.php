<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $fillable = ['title', 'news_category', 'content', 'image', 'author', 'created_date', 'visitor'];

    public function article(){
        return $this->hasOne(Article::class);
    }

    public function news(){
        return $this->hasOne(News::class);
    }
}
