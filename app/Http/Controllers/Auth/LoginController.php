<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // -
    // -
    // -
    // -

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        // dd('pollo');
        $user = Socialite::driver($provider)->stateless()->user();
        // ESTO ES PARA VER EL NOMBRE
        // dd($user->user['given_name']);
        $authUser = $this->findOrCreateUser($user, $provider);
        // dd($authUser);
        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        // dd($authUser);
        if ($authUser) {
            return $authUser;
        }

        if ($provider == 'facebook') {

            $name = explode(' ', $user->user['name']);

            $first_name = $name[0];

            $last_name = $name[1];

            return User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $user->email,
                'provider' => strtoupper($provider),
                'provider_id' => $user->id,
            ]);
        }


        return User::create([
            'first_name' => $user->user['given_name'],
            'last_name' => $user->user['family_name'],
            'email' => $user->email,
            'provider' => strtoupper($provider),
            'provider_id' => $user->id,
        ]);
    }

}
