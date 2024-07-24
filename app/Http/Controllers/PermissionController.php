<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $permission = new Permission;
        return view('permissions.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'string|max:255',
        ]);
        
        Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success', 'Uprawnienie zostało dodane.');
    }

    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        return view('permissions.create', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect()->route('permissions.index')->with('success', 'Uprawnienie zostało zaktualizowane.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Uprawnienie zostało usunięte.');
    }
}
