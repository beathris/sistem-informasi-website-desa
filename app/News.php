<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'news_category', 'content', 'image', 'editor', 'created_date', 'visitor'];
}
