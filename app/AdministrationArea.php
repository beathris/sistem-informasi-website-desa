<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdministrationArea extends Model
{
    protected $table = 'administration_data';
    protected $fillable = ['dusun_name', 'kasun_name', 'neighborhood_association', 'family', 'amount_of_people', 'male', 'female'];
}
