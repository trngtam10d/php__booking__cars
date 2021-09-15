<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarSales extends Model
{
    protected $fillable=['user_id','zipcode','discount_sale' ,'time_start','time_end','status'];
}
