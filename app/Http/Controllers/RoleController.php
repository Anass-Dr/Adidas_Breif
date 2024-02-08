<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Route;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index () {
        $roles = Role::all();
        $routes = Route::all()->toArray();
        usort($routes, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
        return view('back.roles', ['roles' => $roles, 'routes' => $routes]);
    }

    public function updateRole (Request $request) {
        $validatedData = $request->validate([
            'role_id' => 'required|integer',
        ]);



    }
}
