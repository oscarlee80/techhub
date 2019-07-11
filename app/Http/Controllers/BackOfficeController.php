<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Exports\ProductsExport;
use App\Exports\UsersExport;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class BackOfficeController extends Controller
{
    public function index()
    {
        return view('backoffice.index');
    }

    public function products()
    {
        $limit = 10;
        $products = Product::make()->paginate($limit);
        return view ('backoffice.products')->with('products', $products);
    }

    public function showProduct($id)
    {
        $product = Product::find($id);

        return view('backoffice.product')->with('product', $product);
    }

    public function categories()
    {
        $limit = 20;
        $categories = Category::make()->paginate($limit);
        return view ('backoffice.categories')->with('categories', $categories);
    }

    public function showcategory($id)
    {
        $category = Category::find($id);

        return view('backoffice.category')->with('category', $category);
    }

    public function users()
    {
        $limit = 20;
        $users = User::make()->paginate($limit);
        return view('backoffice.users')->with('users', $users);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        return view('user.show')->with('user', $user);
    }

    public function editUser($id)
    {
        $user = User::find($id);

        $roles = [3 => "Normal",
                  6 => "Admin",
                  9 => "Super Admin"];

        return view('user.edit')
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
            unlink("storage/avatars/".$user->avatar);
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

    public function destroyUser($id)
    {
        $user = User::destroy($id);
        return redirect("/backoffice/users");
    }

    public function exportProducts()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
        return redirect("/backoffice/products");
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
        return redirect("/backoffice/users");
    }

    public function exportCategories()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
        return redirect("/backoffice/categories");
    }
}
