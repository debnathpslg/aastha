<?php

namespace App\Http\Controllers;

use App\Models\WorkStatus;
use Illuminate\Http\Request;

class WorkStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataSet = WorkStatus::orderBy('name')->paginate(20);

        return view('workstatus.index', compact(['dataSet']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('workstatus.create', compact([]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:work_statuses,name',
            'short_name'    => 'required|min:2|max:10|unique:work_statuses,short_name',
        ]);

        $item = WorkStatus::make($request->input());
        $item->name         = ucwords(strtolower($item->name));
        $item->short_name   = strtoupper($item->short_name);
        $item->save();

        $request->session()->flash('success', 'Work Status "' . $item->name . '" created successfully.');

        return redirect()->route('workstatus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkStatus $workstatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkStatus $workstatus)
    {
        //
        $item = $workstatus;
        return view('workstatus.edit', compact(['item']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkStatus $workstatus)
    {
        //
        $request->validate([
            'name'          => 'required|min:3|max:50|unique:work_statuses,name,' . $workstatus->id,
            'short_name'    => 'required|min:2|max:10|unique:work_statuses,short_name,' . $workstatus->id,
        ]);

        $successMsg = 'Old Work Status "' . $workstatus->name . '" has now successfully been updated to "' . ucwords(strtolower($request->name)) . '"';

        $workstatus->name         = ucwords(strtolower($request->name));
        $workstatus->short_name   = strtoupper($request->short_name);
        $workstatus->save();

        $request->session()->flash('success', $successMsg);

        return redirect()->route('workstatus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, WorkStatus $workstatus)
    {
        //
        $successMsg = 'Work Status "' . $workstatus->name . '" deleted successfully.';

        $workstatus->delete();

        $request->session()->flash("success", $successMsg);

        return redirect()->route('workstatus.index');
    }
}
