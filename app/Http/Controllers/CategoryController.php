<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('category_id')
            ->with('childrenCategories')
            ->get();
        return view('categories', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $category = new Category(['name' => $data['name']]);
        if (isset($data['parent_id'])) {
            $parent = Category::findOrFail($data['parent_id']);
            $parent->categories()->save($category);
        } else {
            $category->save();
        }

        return redirect()->route('categories.index');
    }
}
