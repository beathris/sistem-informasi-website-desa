<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RangeAgeData extends Model
{
    protected $table = 'range_age_data';
    protected $fillable = ['group', 'total', 'male', 'female'];
}
