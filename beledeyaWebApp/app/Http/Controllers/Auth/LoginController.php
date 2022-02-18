<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Auth;
use Exception;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Socialite
     */

    //Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);

                return redirect('/home');
            } else {
                $exists = User::where('email', $user->email)->count();

                if ($exists > 0) {
                    return redirect('/login')->with('alert_err', 'Email already exists');
                }

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social' => "Google",
                    'password' => Hash::make(Str::random(20)),
                    'email_verified_at' => Carbon::now()->timestamp,
                    'emailConfirmed' => 'true',
                ]);

                Auth::login($newUser);
                return redirect('/home');
            }
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

    //Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);

                return redirect('/home');
            } else {
                $exists = User::where('email', $user->email)->count();

                if ($exists > 0) {
                    return redirect('/login')->with('alert_err', 'Email already exists');
                }

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social' => "Facebook",
                    'password' => Hash::make(Str::random(20)),
                    'email_verified_at' => Carbon::now()->timestamp,
                    'emailConfirmed' => true,
                ]);

                Auth::login($newUser);
                return redirect('/home');
            }
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
