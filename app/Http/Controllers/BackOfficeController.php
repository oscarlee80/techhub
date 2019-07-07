<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use App\User;

class BackOfficeController extends Controller
{
    public function index()
    {
        return view('backoffice.index');
    }

    public function products()
    {
        $limit = 20;
        $products = Product::make()->paginate($limit)->sortBy('title');
        return view ('backoffice.products')->with('products', $products);
    }

    public function categories()
    {
        $limit = 20;
        $categories = Category::make()->paginate($limit)->sortBy('name');
        return view ('backoffice.categories')->with('categories', $categories);
    }

    public function users()
    {
        $limit = 20;
        $users = User::make()->paginate($limit)->sortBy('last_name');
        return view('backoffice.users')->with('users', $users);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        return view('users.show')->with('user', $user);
    }

    public function editUser($id)
    {
        $user = User::find($id);

        $roles = [3, 6, 9];

        return view('users.edit')
            ->with('user', $user)
            ->with('roles', $roles);
    }

    public function updateUser(Request $request, $id)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ];
        $messages = [
            'required' => 'el campo :attribute es obligatorio',
        ];

        $this->validate($request, $rules, $messages);

        $user = User::find($id);

        
        if($request->avatar){
            $photopath = $request->file('avatar')->store('avatars', 'public');
            $avatar = basename($photopath);
            $user->avatar = $avatar;
        }else{
            $user->avatar = $user->avatar;
        }
        // dd($photopath);
        // dd($avatar);

        $user->first_name = $request->first_name !== $user->first_name ? $request->first_name : $user->first_name;
        $user->last_name = $request->last_name !== $user->last_name ? $request->last_name : $user->last_name;
        $user->email = $request->email !== $user->email ? $request->email : $user->email;
        $user->role = $request->role !== $user->role ? $request->role : $user->role;
        // dd($user->avatar);

        // NO TOCAR
        $user->email_verified_at = $user->email_verified_at;
        $user->password = $user->password;
        $user->provider = $user->provider;
        $user->provider_id = $user->provider_id;
        $user->remember_token = $user->remember_token;

        $user->save();

        return redirect(route('usersCrud'));
    }

}
