<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agreement;
use App\Models\FinanceCompany;
use App\Models\UploadedAgreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadCrumbProps = [
            'page_name' => 'Agreements',
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Audit',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Agreement',
                ],
            ],
        ];

        $agreements = Agreement::with([
            'company',
            'uploadedAgreements',
        ])
            ->withCount('uploadedAgreements')
            ->orderByDesc('created_at')
            ->get();

        return view('Agreement.index', compact('agreements', 'breadCrumbProps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadCrumbProps = [
            'page_name' => 'Agreements',
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Audit',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Agreement',
                    'url' => route('agreements.index'),
                ],
                [
                    'label' => 'Create',
                ],
            ],
        ];

        $companies = FinanceCompany::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();

        return view('Agreement.create', compact('breadCrumbProps', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'company_id'         => 'required|exists:finance_companies,id|unique:agreements,company_id',
            'uploaded_agreement' => 'required|file|mimes:pdf,doc,docx,jpg,png,gif|max:10240',
        ]);

        $storedPath = null;

        try {
            DB::transaction(
                function () use ($request, $storedPath) {
                    $userEmployeeId = Auth::user()->employee_id;

                    $agreement = Agreement::create([
                        'company_id' => $request->company_id,
                        'created_by' => $userEmployeeId,
                    ]);

                    $doc = $request->file('uploaded_agreement');
                    $folder = "uploaded_agreements/{$agreement->id}";
                    $storedPath = $doc->store($folder, 'public');

                    UploadedAgreement::create([
                        'agreement_id' => $agreement->id,
                        'file_path' => $storedPath,
                        'file_name' => $doc->getClientOriginalName(),
                        'mime_type' => $doc->getClientMimeType(),
                        'file_size' => $doc->getSize(),
                        'uploaded_by' => $userEmployeeId,
                    ]);
                }
            );
        } catch (\Exception $e) {
            Storage::disk('public')->delete($storedPath);
            throw $e;
        }

        return redirect()->route('agreements.index')
            ->with('success', 'Agreement uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agreement $agreements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agreement $agreement)
    {
        $breadCrumbProps = [
            'page_name' => 'Agreement Uploads',
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Audit',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Agreement',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Edit',
                ],
            ],
        ];

        $agreement->load(['company', 'uploadedAgreements']);

        return view('Agreement.edit', compact('agreement', 'breadCrumbProps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agreement $agreements)
    {
        //
    }

    public function createFromEdit(Request $request, Agreement $agreement)
    {
        $breadCrumbProps = [
            'page_name' => 'Agreement Uploads',
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Audit',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Agreement',
                    'url' => route('agreements.edit'),
                ],
                [
                    'label' => 'Add Uploads',
                ],
            ],
        ];

        $agreement->load('uploadedAgreements');

        return view('Agreement.create_from_edit', compact(['breadCrumbProps', 'agreement']));
    }

    public function storeFromEdit(Request $request, Agreement $agreement)
    {
        if (!$request->hasFile('document.file')) {
            return redirect()->route('agreements.edit', $agreement)
                ->with('warning', 'No file selected. Upload cancelled.');
        }


        $request->validate([
            'document.file' => 'required|file|mimes:pdf,doc,docx,jpg,png,gif|max:10240',
        ]);

        $agreement->load('uploadedAgreements');
        $storedPath = null;

        try {
            DB::transaction(
                function () use ($request, $agreement, $storedPath) {
                    $userEmployeeId = Auth::user()->employee_id;
                    $doc = $request->file('document.file');
                    $folder = "uploaded_agreements/{$agreement->id}";
                    $storedPath = $doc->store($folder, 'public');

                    UploadedAgreement::create([
                        'agreement_id' => $agreement->id,
                        'file_path' => $storedPath,
                        'file_name' => $doc->getClientOriginalName(),
                        'mime_type' => $doc->getClientMimeType(),
                        'file_size' => $doc->getSize(),
                        'uploaded_by' => $userEmployeeId,
                    ]);

                    $agreement->updated_by = $userEmployeeId;
                    $agreement->save();
                }
            );
        } catch (\Exception $e) {
            Storage::disk('public')->delete($storedPath);
            throw $e;
        }

        return redirect()->route('agreements.edit', $agreement)
            ->with('success', 'Agreement uploaded successfully.');
    }

    public function destroyFromEdit(Request $request, UploadedAgreement $doc, Agreement $agreement)
    {
        if ($doc->agreement_id !== $agreement->id) {
            return redirect()->route('agreements.edit', $agreement)
                ->with('error', 'Unauthorised/fictitious activity detected. Hence action aborted.');
        }

        // ===== 1) Physical file delete =====
        if ($doc->file_path && Storage::disk('public')->exists($doc->file_path)) {
            Storage::disk('public')->delete($doc->file_path);
        }

        $doc->forceDelete();

        return redirect()->route('agreements.edit', $agreement)
            ->with('success', 'Uploaded agreement removed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agreement $agreement)
    {
        $agreement->load('uploadedAgreements');

        if ($agreement->uploadedAgreements->isNotEmpty()) {
            return redirect()->route('agreements.index')
                ->with('error', 'Action aborted. Please delete all files first.');
        }

        $folder = "uploaded_agreements/{$agreement->id}";

        if (Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->deleteDirectory($folder);
        }

        $agreement->forceDelete();

        return redirect()->route('agreements.index')
            ->with('success', 'Company agreement uploaded history deleted successfully.');
    }
}
