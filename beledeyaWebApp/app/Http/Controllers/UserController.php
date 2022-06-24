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
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    // function admin 
    public function index()
    {
        $users = User::all();
        return view('admin.userProfiles', compact('users'));
    }
       /**
     * Display the specified resource.
     *
     * @param  \App\User  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(User $userProfile,$id)
    {
         $userProfile = User::find($id);
            if($userProfile ->role =="user"){
        return view('auth.profile', compact('userProfile'));
    }
    if($userProfile ->role =="admin"){
        return view('admin.profile', compact('userProfile'));
    }
    }
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $request->validate($this->validationRules());
     
            $curTime = new \DateTime();
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $result['created_at'] =$curTime;
            $result['updated_at'] =$curTime; 
            $result['social'] ="email";
            $result['emailConfirmed'] =true;
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, strlen($alphabet)-1);
                $pass[$i] = $alphabet[$n];
            }
                $result['password'] =implode($pass);
            User::create($result);
            return back()->with('success', __('main.User add!'));
            try {} catch (\Throwable $th) {
            return back()->with('error', __('main.Ops!Something went wrong'));
        }
    }
 public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$users = array(
    				'name'	=>	$request->name,
    				'email'		=>	$request->email,
    				'role'		=>	$request->role
    			);
    			DB::table('users')
    				->where('id', $request->id)
    				->update($users);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('users')
    				->where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }

    public function edit(Request $request,  User $user,$id)
    {
        $request->validate($this->validationUser());
        try {
            $curTime = new \DateTime();

            $user = User::find($request->pk);

            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->role = $request['role'];
            $user->updated_at = $curTime;
            $user->save();
            return back()->with('success', __('main.User edited'));
        } catch (\Throwable $th) {
            return back()->with('error', __('main.Ops!Something went wrong'));
        }
    }
    public function destroy(User $user, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return back()->with('success', __('main.user deleted!'));
        } catch (\Throwable $th) {
            return back()->with('error', __('main.Ops user not found!'));
        }
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
    return back()->with('error', __('validation.string', ['attribute' => 'Name']));
        }else
        {
            $userEdit->name = $request['name'];
            
        }

            $userEdit->email = $request['email'];
        if ((Str::length($request['mdp_1'])>0)){
            if((Str::length($request['mdp_2'])>0)){
            if($request['mdp_2']==$request['mdp_1']){
                if(Hash::check($request->mdp_1,$userEdit->password )){
                    return back()->with('error', __('passwords.Opss! Old password and new password cant be same'));
                }
                else{
                    if(Str::length($request['mdp_1'])>=8){
            $userEdit->password = Hash::make($request['mdp_1']);
        }else{
            return back()->with('error', __('passwords.password'));
        }
        }
        }
        else{
            return back()->with('error', __('passwords.Opss! Retape the same password'));

        }
    }
    else{
        return back()->with('error', __('passwords.Opss! Retape the same password'));
    }
}
            $userEdit->save();
            return back()->with('success', __('main.User updated'));
        } catch (\Throwable $th) {
            return back()->with('error', __('main.Ops!Something went wrong'));
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
                    return back()->with('error', __('passwords.Confirmation code unvalid'));
                }
            } else {
                return back()->with('error', __('passwords.Please insert the confirmation code'));
            }
        } catch (\Throwable $th) {
            return back()->with('error', __('main.Ops!Something went wrong'));
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
    private function validationRules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required',
            'role' => 'required',

            
        ];
    }
    private function validationUser()
    {
        return [
            'name' => 'string', 
        ];
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
