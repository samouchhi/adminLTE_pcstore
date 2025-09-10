<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        return view('admin.products.index', ['products' => Product::all()]);
    }
    public function create()
    {
        $categories = Categories::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png',

        ]);
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('uploads', $fileName, 'public');
        }


        $product = Product::create([
            'name' => $validate['name'],
            'description' => $validate['description'],
            'price' => $validate['price'],
            'stock' => $validate['stock'],
            'image' => $fileName,
        ]);

        $product->categories()->sync($request->input('category_ids', []));

        return redirect('/admin/products')->with('success', 'Product created successfully!');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/products')->with('success', 'Product deleted successfully!');
    }
    public function edit(Product $product)
    {
        $categories = Categories::all();
        $product = Product::findOrFail($product->id);
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
        $fileName = $product->image;
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('uploads', $fileName, 'public');
        }

        $product->update([
            'name' => $validate['name'],
            'description' => $validate['description'],
            'price' => $validate['price'],
            'stock' => $validate['stock'],
            'image' => $fileName,
        ]);
        $product->categories()->sync($request->input('category_ids', []));
        return redirect('/admin/products')->with('success', 'Product updated successfully!');
    }
}
