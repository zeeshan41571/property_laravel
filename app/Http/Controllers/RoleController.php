<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('userroles.manageUserRoles', compact('roles'));
    }

    public function create()
    {
        return view('userroles.createUserRole');
    }

    public function store(Request $request)
    {
        // print_r($request);
        // exit;
        
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        Role::create($request->all());

        return redirect()->route('roles')
                         ->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('userroles.editUserRole', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());

        return redirect()->route('roles')
                         ->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles')
                         ->with('success', 'Role deleted successfully.');
    }
}
