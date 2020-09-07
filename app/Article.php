<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['title', 'author', 'created_date', 'visitor','article'];

    public function news_category(){
        return $this->belongsTo('news_category', 'news_category_id');
    }
}
