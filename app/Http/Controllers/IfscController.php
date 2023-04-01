<?php

namespace App\Http\Controllers;

use App\Models\Ifsc;
use Illuminate\Http\Request;

class IfscController extends Controller
{
    //
    public function index(Request $request, $q = "")
    {
        //
        // if ($request->has('q')) {
        $q = $request->q;
        $dataSet = Ifsc::where('ifsc', 'LIKE', "%{$q}%")
            ->orWhere('bank', 'LIKE', "%{$q}%")
            ->orWhere('branch', 'LIKE', "%{$q}%")
            // ->orWhere('address', 'LIKE', "%{$q}%")
            ->orderBy('ifsc')
            ->paginate(50);
        // }
        // else {
        //     $dataSet = Ifsc::get()->sortBy('ifsc')->paginate(50);
        // }

        // $request->session()->flash("success", "{$q} searched successfully.");
        return view('ifsc.index', compact(['q', 'dataSet']));
    }
}
