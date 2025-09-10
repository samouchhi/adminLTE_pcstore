<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }
    public function store(Request $request){
        $validate = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('uploads', $fileName, 'public');
        }
        Blog::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'staff_name' => Auth::user()->name,
            'image' => $fileName,
        ]);
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }
    public function create()
    {
        return view('admin.blogs.create');
    }
    public function edit(Blog $blog){
        return view('admin.blogs.edit', compact('blog'));
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
    public function update(Blog $blog, Request $request){
        $validate = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
        $fileName = $blog->image;
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('uploads', $fileName, 'public');
        }
        $blog->update([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'image' => $fileName,
        ]);
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }
}
