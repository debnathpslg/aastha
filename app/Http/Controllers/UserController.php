<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $this->authorize('viewAny', User::class);

        $breadCrumbProps = [
            'page_name' => "User",
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
                    'label' => 'User',
                ],
            ],
        ];

        $currentUser = $request->user();

        if ($currentUser->is_su) {
            $roles = Role::orderBy('level', 'desc')->get();
            $users = User::with('role')
                ->orderByDesc(
                    Role::select('level')
                        ->whereColumn('roles.id', 'users.role_id')
                )
                ->get();
        } else {
            $roles = Role::where('level', '<', $currentUser->role->level)
                ->orderBy('level', 'desc')
                ->get();
            $users = User::with('role')
                ->whereHas('role', function ($q) use ($currentUser) {
                    $q->where('level', '<', $currentUser->role->level);
                })
                ->orderByDesc(
                    Role::select('level')
                        ->whereColumn('roles.id', 'users.role_id')
                )
                ->get();
        }

        return view('User.index', compact('breadCrumbProps', 'roles', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // 1. Policy check
        $this->authorize('create', User::class);

        $currentUser = $request->user();

        // 2. Role dropdown logic
        if ($currentUser->is_su) {
            // SU can create anyone
            $roles = Role::orderBy('level', 'desc')
                ->pluck('name', 'id')
                ->toArray();
        } else {
            // Admin can create only lower-level users
            $roles = Role::where('level', '<', $currentUser->role->level)
                ->orderBy('level', 'desc')
                ->pluck('name', 'id')
                ->toArray();
        }

        // 3. Breadcrumb
        $breadCrumbProps = [
            'page_name' => 'Create User',
            'bread_crumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Admin'],
                ['label' => 'Master'],
                ['label' => 'User', 'url' => route('users.index')],
                ['label' => 'Create'],
            ],
        ];

        return view('User.create', compact(
            'roles',
            'breadCrumbProps'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Policy check
        $this->authorize('create', User::class);

        $currentUser = $request->user();

        // 2. Validate input
        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email',
            'role_id'   => 'required|exists:roles,id',
            'is_active' => 'required|boolean',
        ]);

        // 3. HARD role-level security (very important)
        if (!$currentUser->is_su) {
            $role = Role::findOrFail($validated['role_id']);

            if ($role->level >= $currentUser->role->level) {
                abort(403);
            }
        }

        // 4. Create user
        User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'role_id'    => $validated['role_id'],
            'is_active'  => $validated['is_active'],
            'is_su'      => false,
            'password'   => Hash::make('password'),
            'created_by' => $currentUser->id,
        ]);

        // 5. Redirect
        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize('view', $user, User::class);

        $breadCrumbProps = [
            'page_name' => "User Info",
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
                    'label' => 'User',
                    'url' => route('users.index'),
                ],
                [
                    'label' => 'Info',
                ],
            ],
        ];

        $user->load('role');

        return view('User.show', compact('user', 'breadCrumbProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $currentUser = $request->user();

        // 3. Breadcrumb
        $breadCrumbProps = [
            'page_name' => 'Edit User',
            'bread_crumbs' => [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Admin'],
                ['label' => 'Master'],
                ['label' => 'User', 'url' => route('users.index')],
                ['label' => 'Edit'],
            ],
        ];

        // role dropdown logic
        if ($currentUser->is_su) {
            $roles = Role::orderBy('level', 'desc')
                ->pluck('name', 'id')
                ->toArray();
        } else {
            $roles = Role::where('level', '<', 80)
                ->orderBy('level', 'desc')
                ->pluck('name', 'id')
                ->toArray();
        }

        $user->load('role');

        return view('User.edit', compact('user', 'roles', 'breadCrumbProps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        // ❌ SU user never editable
        if ($user->is_su) {
            abort(403);
        }

        $validated = $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'role_id'   => 'required|exists:roles,id',
            'is_active' => 'required|boolean',
        ]);

        // 🔒 Admin role escalation protection
        $actor = $request->user();

        if (!$actor->is_su) {
            $newRole = Role::findOrFail($validated['role_id']);

            if ($newRole->level >= 80) {
                abort(403);
            }
        }

        $user->update($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function resetPassword(User $user) {
        $this->authorize('resetPassword', $user);

        if ($user->is_su) {
            abort(403);
        }

        $user->update([
            'password' => Hash::make('password'),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Password reset to default');
    }
}
