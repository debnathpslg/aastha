<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataSet = Relationship::orderBy('name')->paginate(20);

        return view('relationship.index', compact(['dataSet']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('relationship.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:relationships,name',
        ]);

        $item = Relationship::make($request->input());
        $item->name         = ucwords(strtolower($item->name));
        $item->save();

        $request->session()->flash('success', 'Relationship "' . $item->name . '" created successfully.');

        return redirect()->route('relationship.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Relationship $relationship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Relationship $relationship)
    {
        //
        $item = $relationship;
        return view('relationship.edit', compact(['item']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Relationship $relationship)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:relationships,name,' . $relationship->id,
        ]);

        $successMsg = 'Old Relationship "' . $relationship->name . '" has now successfully been updated to "' . ucwords(strtolower($request->name)) . '"';

        $relationship->name         = ucwords(strtolower($request->name));
        $relationship->short_name   = strtoupper($request->short_name);
        $relationship->save();

        $request->session()->flash('success', $successMsg);

        return redirect()->route('relationship.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Relationship $relationship)
    {
        //
        $successMsg = 'Relationship "' . $relationship->name . '" deleted successfully.';

        $relationship->delete();

        $request->session()->flash("success", $successMsg);

        return redirect()->route('relationship.index');
    }
}
