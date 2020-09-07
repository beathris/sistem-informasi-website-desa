<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transparency extends Model
{
    protected $table = 'transparency';
    protected $fillable = ['category', 'title', 'content', 'image'];
}
