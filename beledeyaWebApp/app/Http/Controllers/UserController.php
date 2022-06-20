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
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
  
       /**
     * Display the specified resource.
     *
     * @param  \App\User  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(User $userProfile,$id)
    {
         $userProfile = User::find($id);
  
        return view('auth.profile', compact('userProfile'));
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $userEdit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $userEdit,$id)
    {
        //  $request->validate($this->validation());
       
        try {
            $userEdit = User::find($id);
            // dd(is_numeric($request['name']));
if(is_numeric($request['name'])){
    return back()->with('error', 'Opss!Name must be a string');
        }else
        {
            $userEdit->name = $request['name'];
            
        }

            $userEdit->email = $request['email'];
        if ((Str::length($request['mdp_1'])>0)){
            if((Str::length($request['mdp_2'])>0)){
            if($request['mdp_2']==$request['mdp_1']){
                if(Hash::check($request->mdp_1,$userEdit->password )){
                    return back()->with('error', 'Opss! Old password and new password cant be same');
                }
                else{
                    if(Str::length($request['mdp_1'])>=8){
            $userEdit->password = Hash::make($request['mdp_1']);
        }else{
            return back()->with('error', 'Opss! password size must be at least 8 characters');
        }
        }
        }
        else{
            return back()->with('error', 'Opss! Retape the same password');

        }
    }
    else{
        return back()->with('error', 'Opss! Retape the password');
    }
}
            $userEdit->save();
            return back()->with('success', 'User updated');
        } catch (\Throwable $th) {
            return back()->with('error', 'Opss! something went wrong');
        }
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
    // private function validation()
    // {
    //     return [
    //         'name' => 'string|max:255',
    //         'email' => 'string|email|max:255',
    //         'mdp_1' => 'string|min:8|confirmed'
    //     ];
    // }
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['string','max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'mdp_1' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }
}
