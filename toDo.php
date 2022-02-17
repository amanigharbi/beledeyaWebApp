//Login/Register page

<div class="row social-media">
    <div class="col-2">
        <a href="{{ url('auth/facebook') }}"><img src="{{asset('/img/fb-icon.png')}}" alt="icon facebook"></a>
    </div>
    <div class="col-2">
        <a href="{{ url('auth/google') }}"><img src="{{asset('/img/google-icon.png')}}" alt="icon google"></a>
    </div>
</div>





//Login Controller

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

return redirect('/myDashboard');
} else {
$exists=User::where('email',$user->email)->count();

if($exists>0){
return redirect('/login')->with('alert_err', __('main.emailExists'));
}

$newUser = User::create([
'name' => $user->name,
'email' => $user->email,
'social_id' => $user->id,
'social' => "Google",
'password' => Hash::make(Str::random(20)),
]);

Auth::login($newUser);
return redirect('/myDashboard');
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

return redirect('/myDashboard');
} else {
$exists=User::where('email',$user->email)->count();

if($exists>0){
return redirect('/login')->with('alert_err', __('main.emailExists'));
}

$newUser = User::create([
'name' => $user->name,
'email' => $user->email,
'social_id' => $user->id,
'social' => "Facebook",
'password' => Hash::make(Str::random(20)),
]);

Auth::login($newUser);
return redirect('/myDashboard');
}
} catch (Exception $e) {
return redirect('auth/facebook');
}
}

//Twitter
public function redirectToTwitter()
{
return Socialite::driver('twitter')->redirect();
}

public function handleTwitterCallback()
{
try {
$user = Socialite::driver('twitter')->user();

$finduser = User::where('social_id', $user->id)->first();

if ($finduser) {
Auth::login($finduser);

return redirect('/myDashboard');
} else {
$exists=User::where('email',$user->email)->count();

if($exists>0){
return redirect('/login')->with('alert_err', __('main.emailExists'));
}

$newUser = User::create([
'name' => $user->name,
'email' => $user->email,
'social_id' => $user->id,
'social' => "Twitter",
'password' => Hash::make(Str::random(20)),
]);

Auth::login($newUser);
return redirect('/myDashboard');
}
} catch (Exception $e) {
return redirect('auth/twitter');
}
}