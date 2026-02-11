<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\UploadedAgreement;
use Illuminate\Support\Facades\Auth;
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
        //
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
                    'url' => route('home'),
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

        $userEmployeeId = Auth::user()->employee_id;
        $doc = $request->document;
        $folder = "uploaded_agreements/{$agreement->id}";
        $storedPath = $doc['file']->store($folder, 'public');

        UploadedAgreement::create([
            'agreement_id' => $agreement->id,
            'file_path' => $storedPath,
            'file_name' => $doc['file']->getClientOriginalName(),
            'mime_type' => $doc['file']->getClientMimeType(),
            'file_size' => $doc['file']->getSize(),
            'uploaded_by' => $userEmployeeId,
        ]);

        return redirect()->route('agreements.edit', $agreement)
            ->with('success', 'Agreement uploaded successfully.');
    }

    public function destroyFromEdit(Request $request, UploadedAgreement $doc, Agreement $agreement)
    {
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
    public function destroy(Agreement $agreements)
    {
        //
    }
}
