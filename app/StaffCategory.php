<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffCategory extends Model
{
    protected $table = 'staff_category';
    protected $fillable = ['name'];

    public function staff(){
        return $this->hasMany(Staff::class);
    }
}
