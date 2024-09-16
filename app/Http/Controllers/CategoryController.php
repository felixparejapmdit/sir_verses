<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Replace with relevant model

use App\Helpers\ActivityLogHelper;

class CategoryController extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        $categories = Category::latest()->paginate(15); // Order by created_at in descending order
        return view('music_management/categories', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::create($validatedData);

        
        ActivityLogHelper::log('created', $category->name, $category->id, 'add new category');

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    // Display the specified category
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form for editing the specified category
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update the specified category in the database
    public function update(Request $request, Category $category)
    {
       // dd($category);
        $validatedData = $request->validate([
            'edit_name' => 'required|max:255',
        ]);

        $category->update([
            'name' => $request->edit_name,
        ]);


        ActivityLogHelper::log('updated', $category->name, $category->id,  'update the category');

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete the specified category from the database
    public function destroy(Category $category)
    {
        $category->delete();

        ActivityLogHelper::log('deleted', $category->name, $category->id,  'delete the category');

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
