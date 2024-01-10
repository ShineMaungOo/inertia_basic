<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return Inertia::render('Category/Index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return Inertia::render('Category/Create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return Redirect::route('categories')->with('success', 'Category created.');
    }

    public function destroy($id)
    {
        // dd($id);
        $category = Category::find($id);
        $category->delete();
        return Redirect::route('categories')->with('success', 'Category deleted.');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return Inertia::render('Category/Edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->update([
            'name' => $request->name
        ]);
        return Redirect::route('categories')->with('success', 'Category updated.');
    }
}
