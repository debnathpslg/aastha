<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\EducationStandard;

class EducationStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => "Education Standard",
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
                    'label' => 'Education Std.',
                ],
            ],
        ];

        $standards = EducationStandard::select(
            'id',
            'name',
            'is_system',
            'deleted_at',
        )->withTrashed()->get();

        return view('EducationStandard.index', compact('breadCrumbProps', 'standards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
                    'label' => 'Education Std.',
                    'url' => route('standards.index'),
                ],
                [
                    'label' => 'New',
                ],
            ],
        ];

        return view('EducationStandard.create', compact('breadCrumbProps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name'      => 'required|string|max:50|unique:education_standards,name',
        ]);

        EducationStandard::create([
            'name'       => $validated['name'],
            'is_system'  => false,
            'created_by' => $currentUser->employee_id,
        ]);

        return redirect()
            ->route('standards.index')
            ->with('success', "Education standard created successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, EducationStandard $standard)
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
                    'label' => 'Education Std.',
                    'url' => route('standards.index'),
                ],
                [
                    'label' => 'Info',
                ],
            ],
        ];

        return view('EducationStandard.show', compact('standard', 'breadCrumbProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationStandard $standard)
    {
        if ($standard->is_system && $standard->trashed())
            return redirect()
                ->route('standards.index')
                ->with("error", "System/Deleted standards cannot be edited...");
        else {
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
                        'label' => 'Education Std.',
                        'url' => route('standards.index'),
                    ],
                    [
                        'label' => 'Edit',
                    ],
                ],
            ];

            return view('EducationStandard.edit', compact('standard', 'breadCrumbProps'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EducationStandard $standard)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('languages', 'name')
                    ->ignore($standard->id)
                    ->whereNull('deleted_at'),
            ],
        ]);

        $validated['updated_by'] = $currentUser->employee_id;
        $standard->update($validated);

        return redirect()
            ->route('standards.index')
            ->with('success', 'Education standard updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, EducationStandard $standard)
    {
        if ($standard->is_system)
            return redirect()
                ->route('standards.index')
                ->with("error", "System standards cannot be deleted...");
        else {
            $standard->delete();

            return redirect()
                ->route('standards.index')
                ->with("success", "Education standard deleted successfully...");
        }
    }

    public function restore(Request $request, $id)
    {
        $language = EducationStandard::withTrashed()->findOrFail($id);

        $language->restore();

        return redirect()
            ->route('standards.index')
            ->with("success", "Education standard restored successfully...");
    }
}
