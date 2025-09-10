<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }
    public function product()
    {
        $categories = Categories::with('products')->get();
        return view('user.laptop.index', ['products' => Product::all(), 'categories' => $categories]);
    }
    public function blog()
    {
        $blogs = Blog::all();
        return view('user.blogs.index', compact('blogs'));
    }
    public function details(Product $product)
    {
        $product->load('categories'); // eager load categories
        return view('user.details', compact('product'));
    }
    public function pc_hardware()
    {
        $categories = Categories::with('products')->get();
        return view('user.pc-hardware.index', ['products' => Product::all(), 'categories' => $categories]);
    }
    public function accessories(){
        return view('user.accessories.index', ['products' => Product::all()]);
    }
    public function blog_details(Blog $blog){
        return view('user.blogs.detail', compact('blog'));
    }

}
