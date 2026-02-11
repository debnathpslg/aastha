<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinanceCompany;
use Illuminate\Validation\Rule;

class FinanceCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => "Finance Company",
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
                    'label' => 'Company',
                ],
            ],
        ];

        $companies = FinanceCompany::select(
            'id',
            'name',
            'slug',
            'is_system',
            'deleted_at',
        )->withTrashed()->get();

        return view('FinanceCompany.index', compact('breadCrumbProps', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => "Finance Company",
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
                    'label' => 'Finance Company',
                    'url' => route('companies.index'),
                ],
                [
                    'label' => 'New',
                ],
            ],
        ];

        return view('FinanceCompany.create', compact('breadCrumbProps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name'      => 'required|string|max:100|unique:finance_companies,name',
            'slug'      => 'required|string|max:20|unique:finance_companies,slug',
        ]);

        FinanceCompany::create([
            'name'       => $validated['name'],
            'slug'       => $validated['slug'],
            'is_system'  => false,
            'created_by' => $currentUser->employee_id,
        ]);

        return redirect()
            ->route('companies.index')
            ->with('success', "Finance Company created successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, FinanceCompany $company)
    {
        $breadCrumbProps = [
            'page_name' => "Finance Company",
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
                    'label' => 'Finance Company',
                    'url' => route('companies.index'),
                ],
                [
                    'label' => 'Info',
                ],
            ],
        ];

        return view('FinanceCompany.show', compact('company', 'breadCrumbProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinanceCompany $company)
    {
        if ($company->is_system && $company->trashed())
            return redirect()
                ->route('companies.index')
                ->with("error", "System/Deleted Company cannot be edited...");
        else {
            $breadCrumbProps = [
                'page_name' => "Finance Company",
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
                        'label' => 'Finance Company',
                        'url' => route('companies.index'),
                    ],
                    [
                        'label' => 'Edit',
                    ],
                ],
            ];

            return view('FinanceCompany.edit', compact('company', 'breadCrumbProps'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinanceCompany $company)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('companies', 'name')
                    ->ignore($company->id)
                    ->whereNull('deleted_at'),
            ],
            'slug' => [
                'required',
                'string',
                'max:20',
                Rule::unique('companies', 'slug')
                    ->ignore($company->id)
                    ->whereNull('deleted_at'),
            ],
        ]);

        $validated['updated_by'] = $currentUser->employee_id;
        $company->update($validated);

        return redirect()
            ->route('companies.index')
            ->with('success', 'Finance Company updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, FinanceCompany $company)
    {
        if ($company->is_system)
            return redirect()
                ->route('companies.index')
                ->with("error", "Finance Company cannot be deleted...");
        else {
            $company->delete();

            return redirect()
                ->route('companies.index')
                ->with("success", "Finance Company deleted successfully...");
        }
    }

    public function restore(Request $request, $id)
    {
        $company = FinanceCompany::withTrashed()->findOrFail($id);

        $company->restore();

        return redirect()
            ->route('companies.index')
            ->with("success", "Finance Company restored successfully...");
    }
}
