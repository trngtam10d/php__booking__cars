<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class ReferralLink extends Model
{
    protected $fillable = ['user_id', 'referral_program_id'];

    // protected static function boot()
    // {
    //     static::creating(function (ReferralLink $model) {
    //         $model->generateCode();
    //     });
    // }

    private function generateCode()
    {
        $this->code = (string)Uuid::uuid1();
    }

    // public static function getReferral($user, $program)
    // {   
        
    //     return static::firstOrCreate([
    //         'user_id' => $user->id,
    //         'referral_program_id' => $program->id
    //     ]);
    // }

    public function getLinkAttribute()
    {
        return url($this->program->uri) . '?ref=' . $this->code;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


    public function program()
    {
        // TODO: Check if second argument is requried
   
        return $this->belongsTo('App\Models\ReferralProgram', 'referral_program_id', 'id');
    }

    public function relationships()
    {
        return $this->hasMany(ReferralRelationship::class);
        
    }
}