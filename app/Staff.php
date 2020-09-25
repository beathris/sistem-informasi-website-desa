<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = ['name', 'birth_of_place', 'birth_of_date', 'position', 'address', 'image', 'staff_category_id'];

    public function staff_category(){
        return $this->belongsTo(StaffCategory::class, 'staff_category_id');
    }
}
