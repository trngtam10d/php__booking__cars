<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Payment;
use Socialite;

class AdminController extends Controller
{
    
    public function dasbroad()
    {

        return view('backend.dasbroad.main-content');
    }
    public function admin()
    {
        
        return view('backend.dasbroad.main-content');
    }
    //User profile
    public function profile($id)
    {
        
         $profile = User::findOrFail($id);
         $payments = Payment::all();
        
         // return $profile;
         return view('backend.user.profile')->with('profile', $profile)->with('payments', $payments);
    }
    // Trỏ đến google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
             // Mã giới thiệu
           $code = strtoupper(substr(md5(time()), 0, 8));
            if ($finduser) {

                Auth::login($finduser);

                return redirect('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => "google",
                    'photo' => $user->avatar,
                    'country_code' => $code,
                    'password' => bcrypt($user->email)
                ]);

                Auth::login($newUser);
                return redirect('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
