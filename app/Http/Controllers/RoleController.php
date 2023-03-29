<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::where('is_touchable', true)->orderBy('name')->paginate(20);

        return view('role.index', compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('role.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:roles,name',
            'short_name'    => 'required|min:2|max:10|unique:roles,short_name',
        ]);

        $role = Role::make($request->input());
        $role->name         = ucwords(strtolower($role->name));
        $role->short_name   = strtoupper($role->short_name);
        $role->save();

        $request->session()->flash('success', 'Role "' . $role->name . '" created successfully.');

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Role $role)
    {
        //
        return view('role.edit', compact(['role']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //

        $request->validate([
            'name'          => 'required|min:3|max:50|unique:roles,name,' . $role->id,
            'short_name'    => 'required|min:2|max:10|unique:roles,short_name,' . $role->id,
        ]);

        $successMsg = 'Old Role "' . $role->name . '" has now successfully been updated to "' . ucwords(strtolower($request->name)) . '"';

        $role->name         = ucwords(strtolower($request->name));
        $role->short_name   = strtoupper($request->short_name);
        $role->save();

        $request->session()->flash('success', $successMsg);

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Role $role)
    {
        //
        $successMsg = 'Role "' . $role->name . '" deleted successfully.';
        $role->delete();

        $request->session()->flash("success", $successMsg);

        return redirect()->route('role.index');
    }
}
