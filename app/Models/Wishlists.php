<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    protected $fillable=['car_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function car()
    {
        return $this->hasOne('App\Models\Cars', 'id', 'car_id');
    }
    public function render()
    {
        return $this->hasOne('App\Models\Reders', 'id', 'red_id');
    }
}
