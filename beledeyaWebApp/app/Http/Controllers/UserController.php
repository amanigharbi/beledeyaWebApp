<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailBox;
use App\User;

class UserController extends Controller
{
  
       /**
     * Display the specified resource.
     *
     * @param  \App\User  $permisConstruction
     * @return \Illuminate\Http\Response
     */
    public function show(User $userProfile, $id)
    {
        $userProfile = User::find($id);
  
        return view('auth.profile', compact('userProfile'));
    }
    /**
     * Show email verification page
     */
    public function showVerifyEmail()
    {
        if (auth::user()->emailConfirmed == 'false') {
            $code = Str::random(10);
            auth::user()->emailConfirmed = $code;
            auth::user()->save();

            /**Send email to author*/
            $email = [];
            $email['from'] = "beledeya@gmail.com";
            $email['subject'] = "Confirmation code";
            $email['message'] = "Hello dear " . auth::user()->name . ",<br> Your confirmation code is <b>" . $code . "</b>.";
            Mail::to(auth::user()->email)->send(new MailBox($email));
        }

        return view('auth.verifyEmail');
    }

    /**
     * Confirm verify
     */
    public function validEmailCode(Request $request)
    {
        try {
            if ($request['code']) {
                if ($request['code'] == auth::user()->emailConfirmed) {
                    auth::user()->emailConfirmed = 'true';
                    auth::user()->email_verified_at = Carbon::now()->timestamp;
                    auth::user()->save();
                    return redirect(('/home'));
                } else {
                    return back()->with('error', 'Confirmation code unvalid');
                }
            } else {
                return back()->with('error', 'Please insert the confirmation code');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show email verification page
     */
    public function sendNewCode()
    {
        $code = Str::random(10);
        auth::user()->emailConfirmed = $code;
        auth::user()->save();

        return redirect('verifyEmail');
    }
    public function profile(){
        
    }
}
