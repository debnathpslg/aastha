<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //
    function home()
    {
        if (Session::has('current_user')) {
            $images = Carousel::all();

            return view('layouts.dashboard', ['images' => $images]);
        } else {
            return redirect()->route('loginPage');
        }
    }
}
