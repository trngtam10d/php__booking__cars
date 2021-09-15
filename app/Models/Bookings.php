<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $fillable=['user_id','car_id','address' ,'address_off','time_start','time_end' ,'date_start','date_end','status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function cars()
    {
        return $this->hasOne('App\Models\Cars', 'id', 'car_id');
    }
}
