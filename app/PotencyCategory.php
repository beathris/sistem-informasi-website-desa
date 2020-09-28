<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PotencyCategory extends Model
{
    protected $table = 'potency_category';
    protected $fillable = ['name'];

    public function potency(){
        return $this->hasOne(Potency::class);
    }
}
