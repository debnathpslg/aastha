<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $locations = Location::orderBy('name')->paginate(20);

        return view('location.index', compact(['locations']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('location.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:locations,name',
            'short_name'    => 'required|min:2|max:10|unique:locations,short_name',
        ]);

        $location = Location::make($request->input());
        $location->name         = ucwords(strtolower($location->name));
        $location->short_name   = strtoupper($location->short_name);
        $location->save();

        $request->session()->flash('success', 'Location "' . $location->name . '" created successfully.');

        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
        return view('location.edit', compact(['location']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:locations,name,' . $location->id,
            'short_name'    => 'required|min:2|max:10|unique:locations,short_name,' . $location->id,
        ]);

        $successMsg = 'Old Location "' . $location->name . '" has now successfully been updated to "' . ucwords(strtolower($request->name)) . '"';

        $location->name         = ucwords(strtolower($request->name));
        $location->short_name   = strtoupper($request->short_name);
        $location->save();

        $request->session()->flash('success', $successMsg);

        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Location $location)
    {
        //
        $successMsg = 'Location "' . $location->name . '" deleted successfully.';
        $location->delete();

        $request->session()->flash("success", $successMsg);

        return redirect()->route('location.index');
    }
}
