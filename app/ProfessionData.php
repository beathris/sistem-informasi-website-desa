<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionData extends Model
{
    protected $table = 'profession_data';
    protected $fillable= ['group', 'total', 'male', 'female'];
}
