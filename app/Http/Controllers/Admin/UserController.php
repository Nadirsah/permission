<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        return  redirect()->route('admin.user.index')->with('type', 'success')->with('message', 'Məlumat uğurla yeniləndi!');
    }


    /**
     * Display the specified resource.
     */
    public function showRole(User $user)
    {
        $roles = Role::all();
        $permissions=Permission::all();
        return view('admin.users.role', compact('user','roles','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        return view('admin.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        return  redirect()->route('admin.user.index')->with('type', 'success')->with('message', 'Məlumat uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $isActive = $request->is_active == 'true' ? 1 : 0;
        User::where('id', $id)->update(['is_active' => $isActive]);
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function giveUserRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with("Ugursuz");
        }
        $user->assignRole($request->role);
        return back()->with("Ugurlu");
    }
    public function revokeUserRole(User $user,Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with("Icaze silindi");
        }
        return back()->with("Ugursuz");
    }

    public function giveUserPermissions(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with("Ugursuz");
        }
        $user->givePermissionTo($request->permission);
        return back()->with("Ugurlu");
    }
    public function revokeUserPermissions(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('type', 'danger')->with('message', 'Məlumat ugursuz!');
        }
        return back()->with('type', 'success')->with('message', 'Məlumat uğurla yeniləndi!');
    }

    public function test(){
         return view('admin.users.test');
    }
}
