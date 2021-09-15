<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;


class SocialController extends Controller
{
    public function getInfo($social)
    {
        return Socialite::driver($social)->redirect();
    }
    public function checkInfo($social)
    {

        try {
            $user = Socialite::driver($social)->user();
            $finduser = User::where('social_id', $user->id)->first();
             // Mã giới thiệu
            $code = strtoupper(substr(md5(time()), 0, 8));
            if ($finduser) {

                Auth::login($finduser);

                return redirect('/dasbroad');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_type' => "Facebook",
                    'social_id' => $user->id,
                    'photo' => $user->avatar,
                    'country_code' => $code,
                    'password' => bcrypt($user->email)
                ]);

                Auth::login($newUser);

                return redirect('/dasbroad');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
