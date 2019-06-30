<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/'],
            ],
            [
                'email.unique' => 'Este correo ya se encuentra registrado',
                'password.regex' => 'La contraseña debe tener al menos 1 mayuscula, 1 número, 1 minuscula'
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => ucwords(strtolower($data['first_name'])),
            'last_name' => ucwords(strtolower($data['last_name'])),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => 'default.jpeg'
        ]);
    }

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
        // dd($user->id);
        return User::create([
            'first_name' => $user->user['given_name'],
            'last_name' => $user->user['family_name'],
            'email' => $user->email,
            'provider' => strtoupper($provider),
            'provider_id' => $user->id,
        ]);
    }
}
