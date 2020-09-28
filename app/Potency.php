<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potency extends Model
{
    protected $table = 'potency';
    protected $fillable = ['title', 'content', 'image'];

    public function potency_category(){
        return $this->belongsTo(PotencyCategory::class, 'potency_category_id');
    }
}
