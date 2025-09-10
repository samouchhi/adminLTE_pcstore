<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create', ['categories' => Categories::all()]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories,name',
        ]);
        Categories::create($validate);
        return redirect('/admin/categories')->with('success', 'Category created successfully!');
    }
    public function delete(Categories $category)
    {
        $category->delete();
        return redirect('/admin/categories')->with('success', 'Category deleted successfully!');
    }
    public function edit(Categories $category)
    {
        $category = Categories::findOrFail($category->id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, Categories $category)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);
        $category->update($validate);
        return redirect('/admin/categories')->with('success', 'Category updated successfully!');
    }
    public function index()
    {
        return view('admin.category.index', ['categories' => Categories::all()]);
    }
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect('/admin/categories')->with('success', 'Category deleted successfully!');
    }
}
