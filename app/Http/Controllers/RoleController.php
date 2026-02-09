<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->authorize('viewAny', Role::class);

        $breadCrumbProps = [
            'page_name' => "Role",
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Admin',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Master',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Role',
                ],
            ],
        ];

        $roles = Role::select(
            'id',
            'name',
            'slug',
            'level',
            'permission',
            'is_system',
        )
            ->get();

        return view('Role.index', compact('breadCrumbProps', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Role::class);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('create', Role::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
        // $this->authorize('view', Role::class);

        $breadCrumbProps = [
            'page_name' => "Role",
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Admin',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Master',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Role',
                    'url' => route('roles.index'),
                ],
                [
                    'label' => 'Info',
                ],
            ],
        ];

        return view('Role.show', compact('role', 'breadCrumbProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        $this->authorize('update', $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $this->authorize('update', $role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        $this->authorize('delete', $role);

        if ($role->is_system) {
            return back()->with('error', 'System role cannot be deleted');
        }

        $role->delete();

        return back()->with('success', 'Role deleted successfully');
    }
}
