<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnderGraduate extends Model
{
    protected $table = 'under_graduate';
    protected $fillable = ['group', 'total', 'male', 'female'];
}
