<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
                    'label' => 'Language',
                ],
            ],
        ];

        $languages = Language::select(
            'id',
            'name',
            'is_system',
            'deleted_at',
        )->withTrashed()->get();

        return view('Language.index', compact('breadCrumbProps', 'languages'));
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
                    'label' => 'Language',
                    'url' => route('languages.index'),
                ],
                [
                    'label' => 'New',
                ],
            ],
        ];

        return view('Language.create', compact('breadCrumbProps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name'      => 'required|string|max:50|unique:languages,name',
        ]);

        Language::create([
            'name'       => $validated['name'],
            'is_system'  => false,
            'created_by' => $currentUser->employee_id,
        ]);

        return redirect()
            ->route('languages.index')
            ->with('success', "Language created successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Language $language)
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
                    'label' => 'Language',
                    'url' => route('languages.index'),
                ],
                [
                    'label' => 'Info',
                ],
            ],
        ];

        return view('Language.show', compact('language', 'breadCrumbProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        if ($language->is_system && $language->trashed())
            return redirect()
                ->route('languages.index')
                ->with("error", "System/Deleted languages cannot be edited...");
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
                        'label' => 'Language',
                        'url' => route('languages.index'),
                    ],
                    [
                        'label' => 'Edit',
                    ],
                ],
            ];

            return view('Language.edit', compact('language', 'breadCrumbProps'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('languages', 'name')
                    ->ignore($language->id)
                    ->whereNull('deleted_at'),
            ],
        ]);

        $validated['updated_by'] = $currentUser->employee_id;
        $language->update($validated);

        return redirect()
            ->route('languages.index')
            ->with('success', 'Language updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Language $language)
    {
        if ($language->is_system)
            return redirect()
                ->route('languages.index')
                ->with("error", "System languages cannot be deleted...");
        else {
            $language->delete();

            return redirect()
                ->route('languages.index')
                ->with("success", "Language deleted successfully...");
        }
    }

    public function restore(Request $request, $id)
    {
        $language = Language::withTrashed()->findOrFail($id);

        $language->restore();

        return redirect()
            ->route('languages.index')
            ->with("success", "Language restored successfully...");
    }
}
