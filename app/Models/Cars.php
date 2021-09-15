<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable = [
        'name', 'description', 'photo', 'seat', 'color', 'make', 'price', 'discount', 'city', 'insurance', 'rules'
        , 'user_id', 'cat_id', 'red_id', 'locat_id', 'sensors', 'control_parking', 'auto_temp', 'wireless_co', 'conditioner', 'navigator'
        , 'start_date', 'end_date', 'start_time', 'end_time', 'status' , 'book_status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'cars';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function catagory()
    {
        return $this->belongsTo('App\Models\Categories', 'cat_id', 'id');
    }
    public function render()
    {
        return $this->hasOne('App\Models\Reders', 'id', 'red_id');
    }
    public function location()
    {
        return $this->belongsTo('App\Models\Locations', 'locat_id', 'id');
    }
   
    public function rel_prods()
    {
        return $this->hasMany('App\Models\Cars', 'red_id', 'red_id')->orderBy('id', 'DESC')->limit(3);
    }
}
