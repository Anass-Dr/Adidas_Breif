<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Route;
use Hamcrest\Type\IsInteger;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $routes = Route::all()->toArray();
        usort($routes, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
        return view('back.roles', ['roles' => $roles, 'routes' => $routes]);
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required|integer',
        ]);

        $role_id = $request->input('role_id');

        # Get all Routes :
        $routes = $request->input('routes');

        # Clear User Permissions :
        $userPermissions = Permission::where('role_id', $role_id)->get();
        foreach ($userPermissions as $permission) :
            Permission::where('role_id', $role_id)->where('route_id', $permission->route_id)->delete();
        endforeach;

        # Add New User Permissions :
        foreach ($routes as $route) :
            Permission::create([
                "role_id" => $role_id,
                "route_id" => $route
            ]);
        endforeach;

        return redirect('/admin/roles');
    }
}
