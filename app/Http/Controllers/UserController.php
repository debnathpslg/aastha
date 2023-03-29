<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\RecentActivity;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $activeUsers = User::with(['role', 'location'])
            ->whereHas('role', function ($q) {
                $q->where('is_touchable', true);
            })
            ->orderBy('name')
            ->paginate(25);
        $deactiveUsers = User::with(['role', 'location'])
            ->whereHas('role', function ($q) {
                $q->where('is_touchable', true);
            })
            ->onlyTrashed()
            ->orderBy('name')
            ->paginate(25);

        return view('user.index', compact(['activeUsers', 'deactiveUsers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles      = Role::where('is_touchable', true)->orderBy('name')->get();
        $locations  = Location::orderBy('name')->get();

        return view('user.create', compact(['roles', 'locations']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'              => 'bail|required|max:100|min:3',
            'email'             => 'bail|required|email|max:255|min:3|unique:users,email',
            'role_id'           => 'bail|required|exists:roles,id',
            'location_id'       => 'bail|required|array|exists:locations,id',
        ]);

        $user = User::make([
            'name'              => ucwords(strtolower($request->name)),
            'email'             => strtolower($request->email),
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'role_id'           => $request->role_id,
        ]);

        $user->save();
        $user->location()->sync($request->location_id);

        $ra = RecentActivity::make([
            'user_id'   => Auth::id(),
            'title'     => "User Creation",
            'content'   => Auth::user()->name . " created " . $user->name . " with default password.",
            'component' => "USER",
            'bs_colour' => 'success',
        ]);
        $ra->save();

        $request->session()->flash('success', $user->name . " created successfully.");

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        //
        $user = User::with(['location', 'role'])->find($id);

        if (!$user) {
            $request->session()->flash("err", "User not found.");
            return redirect()->route('user.index');
        }

        return view('user.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        //
        $user       = User::with(['location', 'role'])->find($id);

        if (!$user) {
            $request->session()->flash("err", "User not found.");
            return redirect()->route('user.index');
        }

        $roles      = Role::where('is_touchable', true)->orderBy('name')->get();
        $locations  = Location::orderBy('name')->get();

        $oldLoc = [];

        foreach ($user->location as $loc) {
            array_push($oldLoc, $loc->id);
        }

        // dd($oldsLoc);


        return view('user.edit', compact(['user', 'roles', 'locations', 'oldLoc']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name'              => 'bail|required|max:100|min:3',
            'email'             => 'bail|required|email|max:255|min:3|unique:users,email,' . $id,
            'role_id'           => 'bail|required|exists:roles,id',
            'location_id'       => 'bail|required|array|exists:locations,id',
        ]);

        $user = User::find($id);
        $user->update([
            'name'              => ucwords(strtolower($request->name)),
            'email'             => strtolower($request->email),
            'role_id'           => $request->role_id,
        ]);

        $user->location()->sync($request->location_id);

        $ra = RecentActivity::make([
            'user_id'   => Auth::id(),
            'title'     => "User Alteration",
            'content'   => Auth::user()->name . " altered " . $user->name,
            'component' => "USER",
            'bs_colour' => 'primary',
        ]);
        $ra->save();

        $request->session()->flash('success', $user->name . " altered successfully.");

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $u = User::withTrashed()->find($id);

        if (!$u->deleted_at) {
            $successMsg = $u->name . " deactivated successfully.";
            $activityMsg = Auth::user()->name . " deactivated " . $u->name;
            $title = "User Deactivation";
            $colour = "danger";
            $u->delete();
        } else {
            $successMsg = $u->name . " activated successfully.";
            $activityMsg = Auth::user()->name . " activated " . $u->name;
            $title = "User Activation";
            $colour = "primary";
            $u->restore();
        }

        $ra = RecentActivity::make([
            'user_id'   => Auth::id(),
            'title'     => $title,
            'content'   => $activityMsg,
            'component' => "USER",
            'bs_colour' => $colour,
        ]);
        $ra->save();

        $request->session()->flash('success', $successMsg);

        return redirect()->route('user.index');
    }

    public function resetPwd(Request $request, User $user)
    {
        //
        $user->password = Hash::make('password');
        $user->save();

        $ra = RecentActivity::make([
            'user_id'   => Auth::id(),
            'title'     => "User Password Reset",
            'content'   => Auth::user()->name . " reset password for " . $user->name . " to default.",
            'component' => "USER",
            'bs_colour' => "warning",
        ]);
        $ra->save();

        $request->session()->flash('success', "Password reset was successful.");

        return redirect()->route('user.index');
    }
}
