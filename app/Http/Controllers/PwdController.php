<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PwdController extends Controller
{
    //
    public function change()
    {
        // dd(Auth::user());
        $user = Auth::user();
        return view('pwd.pwd_form');
    }

    public function save(Request $request)
    {
        $request->validate([
            'password' => "required|min:5|confirmed",
        ]);

        $user = User::find(Auth::id());

        // dd($request->password);
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->flash('success', "Password changed successfully for " . $user->name . ".");
        return redirect()->route('home.index');
    }
}
