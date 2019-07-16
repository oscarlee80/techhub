<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class ProfileController extends Controller
{
    public function show($id){

        $user = User::find($id);

        return view('profile.show')->with('user', $user);

    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        if($request->first_name){

            $rules = [
            'first_name' => 'alpha'
            ];

            $message = [
                'first_name.alpha' => 'Ingresar solo letras'
            ];

            $this->validate($request, $rules, $message);

            $first_name = ucwords(strtolower($request->first_name));

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['first_name' => $first_name]);
        }

        if ($request->last_name) {

            $rules = [
                'last_name' => 'alpha'
            ];

            $message = [
                'last_name.alpha' => 'Ingresar solo letras'
            ];

            $this->validate($request, $rules, $message);

            $last_name = ucwords(strtolower($request->last_name));

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['last_name' => $last_name]);
        }

        if ($request->email) {

            // dd($request->all());
            $email = $request->email;

            $rules = [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ];

            $message = [
                'email.email' => 'Email invalido',
                'email.unique' => 'Este correo ya se encuentra registrado',
            ];

            $this->validate($request, $rules, $message);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['email' => $email]);
        }

        if ($request->avatar) {
            $photopath = $request->file('avatar')->store('avatars', 'public');
            $avatar = basename($photopath);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['avatar' => $avatar]);
        }

        return redirect("/profile/" . $user->id . '#body');
        
    }
}
