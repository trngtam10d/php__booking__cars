<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historys extends Model
{
    protected $fillable=['user_id','book_id','status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function booking()
    {
        return $this->belongsTo('App\Models\Bookings', 'book_id', 'id');
    }
    public function car()
    {
        return $this->belongsTo('App\Models\Cars', 'car_id', 'id');
    }
}
