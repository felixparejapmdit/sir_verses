<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogHelper;
use App\Models\PermissionCategory;
use Illuminate\Http\Request;

class PermissionCategoryController extends Controller
{
    public function index()
    {
        $categories = PermissionCategory::whereNotNull('name')->get();
        return view('permission_categories.index', compact('categories'));
    }
    

    public function create()
    {
        return view('permission_categories.create');
    }

    public function store(Request $request)
    {
         
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $newCategory = PermissionCategory::create($request->all());
     //dd($request);
        //ActivityLogHelper::log('created', 'Permission Category', $newCategory->id, 'add new category');
    
        return redirect()->route('permission_categories.index')
                         ->with('success', 'Category created successfully.');
    }

    public function edit(PermissionCategory $permissionCategory)
    {
        return view('permission_categories.edit', compact('permissionCategory'));
    }

    public function update(Request $request, PermissionCategory $permissionCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $permissionCategory->update($request->all());

        

        
        ActivityLogHelper::log('updated', 'Permission Category', $permissionCategory->id,  'update the category');

        return redirect()->route('permission_categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(PermissionCategory $permissionCategory)
    {
        $permissionCategory->delete();

        ActivityLogHelper::log('deleted', 'Permission Category', $permissionCategory->id,  'delete the category');

        return redirect()->route('permission_categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
