<?php

namespace App\Http\Controllers;

use App\Models\RecentActivity;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function getCurrentUser($id)
    {
        $activeUser = User::with('role')->where('id', '=', $id)->first();

        return $activeUser;
    }

    public static function getRecentActivities()
    {
        $user = Auth::user();

        if ($user->role->short_name == 'SU' || $user->role->short_name == 'AD') {
            $recentActivities = RecentActivity::with('user')
                ->orderBy('created_at', 'desc')
                ->get()
                ->take(20);
        } else {
            $recentActivities = RecentActivity::with('user')
                ->where('user_id', '=', $user->id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->take(20);
        }

        return $recentActivities;
    }
}
