<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table = 'religion';
    protected $fillable = ['group', 'total', 'male', 'female'];
}
