<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable=['user_id','car_id','rate','review','reply','status'];

    public function user_info()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public static function getAllReview()
    {
        return Reviews::with('user_info')->paginate(10);
    }
    public static function getAllUserReview()
    {
        return Reviews::where('user_id', auth()->user()->id)->with('user_info')->paginate(10);
    }
    public function car_review()
    {
        return $this->hasOne('App\Models\Cars', 'id', 'car_id');
    }
}
