<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costdate extends Model
{
    protected $fillable = [
        'onetothree','fiveonline','tentofourteen','morefifteen','car_id '
     ];
     protected $primaryKey = 'id';
     protected $table = 'costdates';
}
