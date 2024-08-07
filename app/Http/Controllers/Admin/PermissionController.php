<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate(5);
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create', );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        Permission::create(['name' => $request->input('name')]);
      
        
        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
        $roles = Role::all();
        $permissions = Permission::find($id);
        return view('admin.permission.edit', compact('permissions','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();
        return redirect()->route('admin.permissions.index')
            ->with('success', 'Role updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with("Ugurlu");
    }

    public function giveRoles(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with("Ugursuz");
        }
        $permission->assignRole($request->role);
        return back()->with("Ugurlu");
    }
    public function removeRole(Permission $permission,Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with("Icaze silindi");
        }
        return back()->with("Ugursuz");
    }
}
