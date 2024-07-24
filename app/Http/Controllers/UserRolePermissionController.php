<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UserRolePermissionController extends Controller
{

    public function usersRolesPermissions(){
        $users = User::with(['roles.permissions'])->get();

        return view('roles.table', compact('users'));
    }


    public function showAssignRoleForm(){
        $users = User::all();
        $roles = Role::all();
        return view('roles.assign_role', compact('users', 'roles'));
    }

    public function showAssignPermissionForm(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('permissions.assign_permission', compact('roles', 'permissions'));
    }

    // Przypisanie roli do użytkownika
    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        $role = Role::find($request->role_id);

        if ($user && $role) {
            $user->roles()->syncWithoutDetaching($role->id); // Użyj metody attach dla relacji wiele do wielu
            return redirect()->back()->with('success', 'Rola została przypisana.');
        }

        return redirect()->back()->with('error', 'Nie udało się przypisać roli.');
    }

    // Przypisanie uprawnienia do roli
    public function assignPermission(Request $request)
    {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);

        if ($role && $permission) {
            $role->permissions()->syncWithoutDetaching($permission->id); // Użyj metody attach dla relacji wiele do wielu
            return redirect()->back()->with('success', 'Uprawnienie zostało przypisane.');
        }

        return redirect()->back()->with('error', 'Nie udało się przypisać uprawnienia.');
    }


    public function removeRole(Request $request, $userId){
        $user = User::findOrFail($userId);
        $roleId = $request->input('role_id');
        $user->roles()->detach($roleId);

        return redirect()->back()->with('success', 'Rola została usunięta od użytkownika.');
    }

    public function removePermission(Request $request, $roleId){
        $role = Role::findOrFail($roleId);
        $permissionId = $request->input('permission_id');
        $role->permissions()->detach($permissionId);

        return redirect()->back()->with('success', 'Uprawnienie zostało usunięte od roli.');
    }



}