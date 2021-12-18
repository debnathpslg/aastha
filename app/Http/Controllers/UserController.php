<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    function showLoginPage()
    {
        //
        if (!Session::has('current_user')) {
            return view('user.login');
        } else {
            return redirect()->route('homePage');
        }
    }

    function submitLoginInfo(Request $request)
    {
        try {
            $requestedUser = User::where(['user_email' => $request->user_email])->first();

            if (!isset($requestedUser)) {
                return redirect()->back()->withErrors(['errMsg' => 'User Not found. Please check email id.']);
            } elseif (!Hash::check($request->password, $requestedUser->password)) {
                return redirect()->back()->withErrors(['errMsg' => 'Incorrect Password.']);
            } elseif (!$requestedUser->is_active) {
                return redirect()->back()->withErrors(['errMsg' => 'User is not verified. Please contact system administrator.']);
            } elseif ($requestedUser->is_logged_in) {
                return redirect()->back()->withErrors(['errMsg' => 'The user is already logged in.']);
            } else {
                $request->session()->put('current_user', $requestedUser);

                User::where('id', '=', $requestedUser->id)
                    ->update([
                        'last_login' => now(),
                        'is_logged_in' => true,
                    ]);
            }

            return redirect()->route('homePage');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errMsg' => $e->getMessage()]);
        }
    }

    function logoutUser()
    {
        if (Session::has('current_user')) {
            $currentUser = Session::get('current_user');

            User::where('id', '=', $currentUser->id)->update(['is_logged_in' => false]);
            Session::forget('current_user');
        }
        
        return redirect()->route('homePage');
    }
}
