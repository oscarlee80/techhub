<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{
    public function show($id){

        $user = User::find($id);

        return view('profile.show')->with('user', $user);

    }
    
    public function update(Request $request, $id)
    {
       // dd($request->all());
        // dd($id);
        
        // $rules = [
        //     'first_name' => 'required',
        //     'last_name' => 'required'
        // ];

        // $message = [
        //     'required' => 'Campo :attribute obligatorio'
        // ];

        // $this->validate($request, $rules, $message);

        $user = User::find($id);

            // $user->email = $request->email !== $user->email ? $request->email : $user->email;

            // dd( $user->email);
   

            // dd('llegue');


            // $movie->title = $request->title !== $movie->title ? $request->title : $movie->title;

        if($request->first_name){

            $first_name = ucwords(strtolower($request->first_name));

            $user->first_name = $first_name !== $user->first_name ? $first_name : $user->first_name;
            $user->last_name = $user->last_name;
            $user->email = $user->email;
            $user->email_verified_at = $user->email_verified_at;
            $user->avatar = $request->avatar === $user->avatar ? $request->avatar : $user->avatar;
            $user->password = $user->password;
            $user->role = $user->role;
            $user->provider = $user->provider;
            $user->provider_id = $user->provider_id;
            $user->remember_token = $user->remember_token;  

        }

        if ($request->last_name) {

            $last_name = ucwords(strtolower($request->last_name));

            $user->first_name = $user->first_name;
            $user->last_name = $last_name !== $user->last_name ? $last_name : $user->last_name;$user->last_name;
            $user->email = $user->email;
            $user->email_verified_at = $user->email_verified_at;
            $user->avatar = $request->avatar === $user->avatar ? $request->avatar : $user->avatar;
            $user->password = $user->password;
            $user->role = $user->role;
            $user->provider = $user->provider;
            $user->provider_id = $user->provider_id;
            $user->remember_token = $user->remember_token;
        }
        
        
            // dd($user);

            $user->save();

            // dd('paso el save');

            return redirect("/profile/" . $user->id . '#body');

        
    }
}
