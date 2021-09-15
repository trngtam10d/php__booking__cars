<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['user_id', 'car_id', 'comment', 'status', 'replied_comment'];
    protected $primaryKey = 'id';
    protected $table = 'comments';
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function car()
    {
        return $this->belongsTo('App\Models\Cars', 'car_id', 'id');
    }
}
