<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function index()
    {
        return redirect('/products');
    }

    public function products()
    {
        $data = [
            'title' => 'Products',
            'products' => Product::all(),
        ];
        return view('frontend.dashboard', compact('data'));
    }

    //Auth
    public function login()
    {
        return view('login', ['title' => 'Login']);
    }

    public function register()
    {
        return view('register', ['title' => 'Register']);
    }
    //admin
    public function admin_dashboard()
    {
        $data = [
            'products' => Product::count(),
            'users' => User::count(),
        ];
        return view('backend.dashboard', ['title' => 'Dashboard', 'data' => $data]);
    }
    public function admin_products()
    {
        $products = Product::all();
        return view('backend.products.show', ['title' => 'Products', 'products' => $products]);
    }
}
