<?php

namespace App\Http\Controllers;

use App\Models\PropDocType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropDocTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadCrumbProps = [
            'page_name' => "Proprietor Document Type",
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
                    'label' => 'Prop. Doc. Type',
                ],
            ],
        ];

        $pdoctypes = PropDocType::select(
            'id',
            'name',
            'is_system',
            'deleted_at',
        )->withTrashed()->get();

        return view('PropDocType.index', compact('breadCrumbProps', 'pdoctypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadCrumbProps = [
            'page_name' => "Proprietor Document Type",
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
                    'label' => 'Prop. Doc. Type',
                    'url' => route('pdoctypes.index'),
                ],
                [
                    'label' => 'New',
                ],
            ],
        ];

        return view('PropDocType.create', compact('breadCrumbProps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name'      => 'required|string|max:100|unique:prop_doc_types,name',
        ]);

        PropDocType::create([
            'name'       => $validated['name'],
            'is_system'  => false,
            'created_by' => $currentUser->employee_id,
        ]);

        return redirect()
            ->route('pdoctypes.index')
            ->with('success', "Proprietor document type created successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(PropDocType $pdoctype)
    {
        $breadCrumbProps = [
            'page_name' => "Proprietor Document Type",
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
                    'label' => 'Prop. Doc. Type',
                    'url' => route('pdoctypes.index'),
                ],
                [
                    'label' => 'Info',
                ],
            ],
        ];

        return view('PropDocType.show', compact('pdoctype', 'breadCrumbProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropDocType $pdoctype)
    {
        if ($pdoctype->is_system && $pdoctype->trashed())
            return redirect()
                ->route('pdoctypes.index')
                ->with("error", "System/Deleted Document type cannot be edited...");
        else {
            $breadCrumbProps = [
                'page_name' => "Proprietor Document Type",
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
                        'label' => 'Prop. Doc. Type',
                        'url' => route('pdoctypes.index'),
                    ],
                    [
                        'label' => 'Edit',
                    ],
                ],
            ];

            return view('PropDocType.edit', compact('pdoctype', 'breadCrumbProps'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropDocType $pdoctype)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('prop_doc_types', 'name')
                    ->ignore($pdoctype->id)
                    ->whereNull('deleted_at'),
            ],
        ]);

        $validated['updated_by'] = $currentUser->employee_id;
        $pdoctype->update($validated);

        return redirect()
            ->route('pdoctypes.index')
            ->with('success', 'Proprietor document type updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropDocType $pdoctype)
    {
        if ($pdoctype->is_system)
            return redirect()
                ->route('pdoctypes.index')
                ->with("error", "Proprietor document type cannot be deleted...");
        else {
            $pdoctype->delete();

            return redirect()
                ->route('pdoctypes.index')
                ->with("success", "Proprietor document type deleted successfully...");
        }
    }

    public function restore(Request $request, $id)
    {
        $company = PropDocType::withTrashed()->findOrFail($id);

        $company->restore();

        return redirect()
            ->route('pdoctypes.index')
            ->with("success", "Proprietor document type successfully...");
    }
}
