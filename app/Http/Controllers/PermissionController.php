<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Helpers\ActivityLogHelper;
use App\Models\PermissionCategory;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $categories = PermissionCategory::with('permissions')->get();
       
        return view('permissions.index', compact('categories'));
    }
    
    public function create()
    {
        $categories = PermissionCategory::all();
        return view('permissions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:permission_categories,id',
        ]);

        $permission = Permission::create($request->only(['name', 'description']));

        $permission->categories()->attach($request->category_id);

        
        ActivityLogHelper::log('created', 'Permission', $permission->id, 'add new permission');


        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        $categories = PermissionCategory::all();
        return view('permissions.edit', compact('permission', 'categories'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'description' => 'nullable|string',
            'category_id' => 'required|exists:permission_categories,id',
        ]);

        $permission->update($request->only(['name', 'description']));
        $permission->categories()->sync($request->category_id);

        ActivityLogHelper::log('updated', 'Permission', $permission->id,  'update the permission');

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        ActivityLogHelper::log('deleted', 'Permission', $permission->id,  'delete the permission');

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}

