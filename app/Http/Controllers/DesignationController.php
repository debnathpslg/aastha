<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataSet = Designation::orderBy('name')->paginate(20);

        return view('designation.index', compact(['dataSet']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('designation.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:designations,name',
            'short_name'    => 'required|min:2|max:10|unique:designations,short_name',
        ]);

        $item = Designation::make($request->input());
        $item->name         = ucwords(strtolower($item->name));
        $item->short_name   = strtoupper($item->short_name);
        $item->save();

        $request->session()->flash('success', 'Designation "' . $item->name . '" created successfully.');

        return redirect()->route('designation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        //
        $item = $designation;
        return view('designation.edit', compact(['item']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $designation)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:designations,name,' . $designation->id,
            'short_name'    => 'required|min:2|max:10|unique:designations,short_name,' . $designation->id,
        ]);

        $successMsg = 'Old Designation "' . $designation->name . '" has now successfully been updated to "' . ucwords(strtolower($request->name)) . '"';

        $designation->name         = ucwords(strtolower($request->name));
        $designation->short_name   = strtoupper($request->short_name);
        $designation->save();

        $request->session()->flash('success', $successMsg);

        return redirect()->route('designation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Designation $designation)
    {
        //
        $successMsg = 'Designation "' . $designation->name . '" deleted successfully.';

        $designation->delete();

        $request->session()->flash("success", $successMsg);

        return redirect()->route('designation.index');
    }
}
