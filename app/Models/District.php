<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable=['locat_id','car_id','city_address'];

    public function location()
    {
        return $this->hasOne('App\Models\Locations', 'id', 'locat_id');
    }
    public function car()
    {
        return $this->hasOne('App\Models\Cars', 'id', 'car_id');
    }
}
