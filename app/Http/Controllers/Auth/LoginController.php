<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;


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
    protected $redirectTo = RouteServiceProvider::HOME;

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
  * Redirect the user to the Provider authentication page.
  *
  * @return \Illuminate\Http\Response
  */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
     /**
     * Obtain the user information from Provider
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return HTMLMin::blade(redirect('/login'));
        }
        // check if they're an existing user
        $existingUser = User::withTrashed()->where('email', $user->email)->first();
        // Check if user is already registered with another provider with the same email
        if ($existingUser && $existingUser->provider != $provider) {
            return HTMLMin::blade(redirect('/login')->with('error', 'Vous êtes déjà inscrit avec un autre compte'));
        }

        if($existingUser){
            // log them in
            if($existingUser->trashed()){
                $existingUser->restore();
            }
            auth()->login($existingUser, false);
            
        } else {
            // todo redirect to a page to define password
            // create a new user
            $newUser = new User;
            //$newUser->password = "password"; // todo remove for prod

            if ($provider == "google") {
                // Verify if $user->name has 2 parts using explodeName function
                $name = $this->explodeName($user->name);
                $newUser->firstname = $name[0];
                $newUser->lastname = $name[1];

                $newUser->provider = "google";
                $newUser->provider_id = $user->id;
            }
            if ($provider == "twitter") {
                $newUser->firstname = 'Mettre à jour vortre prénom';
                $newUser->lastname = 'Mettre à jour vortre nom';
                $newUser->nickname = $user->nickname;
                $newUser->provider = "twitter";
                $newUser->provider_id = $user->id;
            }
            if ($provider == "facebook") {
                // Verify if $user->name has 2 parts using explodeName function
                $name = $this->explodeName($user->name);
                $newUser->firstname = $name[0];
                $newUser->lastname = $name[1];
                $newUser->provider = "facebook";
                $newUser->provider_id = $user->id;
            }
            if ($provider == "github") {
                $newUser->firstname = 'Mettre à jour vortre prénom';
                $newUser->lastname = 'Mettre à jour vortre nom';
                $newUser->provider = "github";
                $newUser->provider_id = $user->id;
            }
            if ($provider == "linkedin") {
                // Verify if $user->name has 2 parts using explodeName function
                $name = $this->explodeName($user->name);
                $newUser->firstname = $name[0];
                $newUser->lastname = $name[1];
                
                $newUser->provider = "linkedin";
                $newUser->provider_id = $user->id;
            }
            $newUser->email = $user->email;
            $newUser->save();
            
            auth()->login($newUser, false);
        }
        

        if (Auth::user()->control_id == 0){
            return redirect()->route('profil');
        }
        elseif (Auth::user()->control_id == 1){
            return redirect()->route('mailbox');
        }
        elseif (Auth::user()->control_id == 2){
            return redirect()->route('replay');
        }
    }

    // Function to explode the name of the user (Only usefull for some providers)
    public function explodeName($name)
    {
        $name = explode(" ", $name);
        if (count($name) == 2) {
            $firstname = $name[0];
            $lastname = $name[1];
        } else {
            $firstname = $name[0];
            $lastname = "";
        }
        return [$firstname, $lastname];
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return HTMLMin::blade(redirect('/login'));
    }
}
