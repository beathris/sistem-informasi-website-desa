<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = ['name', 'birth_of_place', 'birth_of_date', 'position', 'address', 'image'];

    public function staff_category(){
        return $this->belongsTo('staff_category', 'staff_category_id');
    }
}
