<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';
    protected $fillable = ['title', 'author', 'created_date', 'visitor', 'description', 'image'];
}
