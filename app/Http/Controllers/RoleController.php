<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $role = new Role;
        return view('roles.create', compact('role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'string|max:255',
        ]);

        Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rola została dodana.');
    }

    public function show(Role $role)
    {
        return view('roles.index', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('roles.create', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Rola została zaktualizowana.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rola została usunięta.');
    }
}
