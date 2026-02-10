<?php

namespace App\Http\Controllers;

use App\Models\Relation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RelationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => "Relation",
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Admin',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Master',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Relation',
                ],
            ],
        ];

        $relations = Relation::select(
            'id',
            'name',
            'is_system',
            'is_valid_beneficiary',
            'is_valid_reference',
            'deleted_at',
        )->withTrashed()->get();

        return view('Relation.index', compact('breadCrumbProps', 'relations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => "Relation",
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Admin',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Master',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Relation',
                    'url' => route('relations.index'),
                ],
                [
                    'label' => 'New',
                ],
            ],
        ];

        return view('Relation.create', compact('breadCrumbProps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name'      => 'required|string|max:50|unique:relations,name',
            'is_valid_beneficiary'      => 'required|boolean',
            'is_valid_reference'        => 'required|boolean',
        ]);

        Relation::create([
            'name'       => $validated['name'],
            'is_valid_beneficiary'       => $validated['is_valid_beneficiary'],
            'is_valid_reference'         => $validated['is_valid_reference'],
            'is_system'  => false,
            'created_by' => $currentUser->employee_id,
        ]);

        return redirect()
            ->route('relations.index')
            ->with('success', "Relation created successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Relation $relation)
    {
        $breadCrumbProps = [
            'page_name' => "Language",
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Admin',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Master',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Relation',
                    'url' => route('relations.index'),
                ],
                [
                    'label' => 'Info',
                ],
            ],
        ];

        return view('Relation.show', compact('relation', 'breadCrumbProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Relation $relation)
    {
        if ($relation->is_system && $relation->trashed())
            return redirect()
                ->route('languages.index')
                ->with("error", "System/Deleted relation cannot be edited...");
        else {
            $breadCrumbProps = [
                'page_name' => "Relation",
                'bread_crumbs' => [
                    [
                        'label' => 'Home',
                        'url' => route('home'),
                    ],
                    [
                        'label' => 'Admin',
                        // 'url' => route('home'),
                    ],
                    [
                        'label' => 'Master',
                        // 'url' => route('home'),
                    ],
                    [
                        'label' => 'Relation',
                        'url' => route('relations.index'),
                    ],
                    [
                        'label' => 'Edit',
                    ],
                ],
            ];

            return view('Relation.edit', compact('relation', 'breadCrumbProps'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Relation $relation)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('relations', 'name')
                    ->ignore($relation->id)
                    ->whereNull('deleted_at'),
            ],
            'is_valid_beneficiary'      => 'required|boolean',
            'is_valid_reference'        => 'required|boolean',
        ]);

        $validated['updated_by'] = $currentUser->employee_id;
        $relation->update($validated);

        return redirect()
            ->route('relations.index')
            ->with('success', 'Relation updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Relation $relation)
    {
        if ($relation->is_system)
            return redirect()
                ->route('relations.index')
                ->with("error", "System relation cannot be deleted...");
        else {
            $relation->delete();

            return redirect()
                ->route('relations.index')
                ->with("success", "Relation deleted successfully...");
        }
    }

    public function restore(Request $request, $id)
    {
        $relation = Relation::withTrashed()->findOrFail($id);

        $relation->restore();

        return redirect()
            ->route('relations.index')
            ->with("success", "Relation restored successfully...");
    }
}
