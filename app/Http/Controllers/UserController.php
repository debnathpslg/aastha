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

    function showRegisterPage()
    {
        if (!Session::has('current_user')) {
            return view('user.signup');
        } else {
            return redirect()->route('homePage');
        }
    }

    function submitRegInfo(Request $request)
    {

        $request->user_name = ucwords(trim($request->user_name));
        $request->user_email = trim($request->user_email);
        $request->user_mobile = trim($request->user_mobile);
        $request->password = trim($request->password);
        $request->conf_password = trim($request->conf_password);
        $request->emp_id = strtoupper(trim($request->emp_id));

        $request->validate(
            [
                'user_name' => 'required|min:4|max:50',
                'user_email' => 'required|regex:/(.+)@(.+)\.(.+)/i|min:6|max:50|unique:users,user_email',
                'user_mobile' => 'required|digits:10|numeric|unique:users,user_mobile',
                'password' => 'required|min:8|max:20',
                'conf_password' => 'required|min:8|max:20|same:password',
            ],
            [
                'user_name.required' => 'User name cannot be blank.',
                'user_name.min' => 'User name must contain atleast 4 characters.',
                'user_name.max' => 'User name must not exceed length of 50 characters.',
                'user_email.required' => 'Email cannot be blank.',
                'user_email.min' => 'Email must contain atleast 6 characters.',
                'user_email.max' => 'Email must not exceed length of 50 characters.',
                'user_email.regex' => 'Invalid email.',
                'user_email.unique' => 'This email is already registered.',
                'user_mobile.required' => 'Mobile cannot be blank.',
                'user_mobile.digits' => 'Mobile number must have exactly 10 digits.',
                'user_mobile.numeric' => 'Only numeric inputs are allowed.',
                'user_mobile.unique' => 'This mobile is already registered.',
                'password.required' => 'Password cannot be blank.',
                'password.min' => 'Password must contain atleast 8 characters.',
                'password.max' => 'Password cannot exceed length of 20 characters.',
                'conf_password.required' => 'Confirm Password cannot be blank.',
                'conf_password.min' => 'Confirm Password must contain atleast 8 characters.',
                'conf_password.max' => 'Confirm Password cannot exceed length of 20 characters.',
                'conf_password.same' => 'Password and Confirm Password do not match.',
            ]
        );

        $newUserData = new User;

        $newUserData->user_name = $request->user_name;
        $newUserData->user_email = $request->user_email;
        $newUserData->user_mobile = $request->user_mobile;
        $newUserData->password = Hash::make($request->password);
        $newUserData->user_role = 0;
        $newUserData->is_active = false;
        $newUserData->location_id = 2;
        $newUserData->last_login = null;
        $newUserData->is_logged_in = false;
        $newUserData->emp_id = $request->emp_id;

        try {
            $newUserData->save();

            return redirect()->route('homePage');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['other_msg' => $e->getMessage()]);
        }
    }
}
