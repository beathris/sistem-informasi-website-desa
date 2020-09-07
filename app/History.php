<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $fillable= ['title', 'author', 'created_date', 'visitor', 'content', 'image'];
}
