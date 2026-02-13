<?php

namespace App\Http\Controllers;

use App\Models\PropDocType;
use App\Models\PropDocument;
use App\Models\UploadedPropDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PropDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadCrumbProps = [
            'page_name' => 'Proprietor Documents',
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
                    'label' => 'Prop. Docs.',
                ],
            ],
        ];

        $propDocs = PropDocument::with([
            'propDocType',
            'uploadedPropDoc',
        ])
            ->orderByDesc('created_at')
            ->get();

        $propDocTypes = PropDocType::with(['propDocument', 'propDocument.uploadedPropDoc'])
            ->orderBy('name')
            ->get();

        return view('PropDocument.index', compact('propDocs', 'breadCrumbProps', 'propDocTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadCrumbProps = [
            'page_name' => 'Proprietor Documents',
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
                    'label' => 'Prop. Docs.',
                    'url' => route('prop_uploads.create'),
                ],
                [
                    'label' => 'Upload',
                ],
            ],
        ];

        $docTypes = PropDocType::where('has_uploaded_file', false)
            ->orderBy('name')
            ->pluck('name', 'id')
            ->toArray();

        return view('PropDocument.create', compact('breadCrumbProps', 'docTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prop_doc_type_id' => 'required|exists:prop_doc_types,id|unique:prop_documents,prop_doc_type_id',
            'uploaded_doc'     => 'required|file|mimes:pdf,doc,docx,jpg,png,gif|max:1024',
        ]);

        $storedPath = null;
        $userEmployeeId = Auth::user()->employee_id;

        DB::beginTransaction();

        try {
            $propDoc = PropDocument::create([
                'prop_doc_type_id' => $validated['prop_doc_type_id'],
                'created_by' => $userEmployeeId,
            ]);

            $doc        = $request->file('uploaded_doc');
            $folder     = "prop_documents/{$propDoc->id}";
            $storedPath = $doc->store($folder, 'public');

            UploadedPropDoc::create([
                'prop_document_id' => $propDoc->id,
                'file_path'        => $storedPath,
                'file_name'        => $doc->getClientOriginalName(),
                'mime_type'        => $doc->getClientMimeType(),
                'file_size'        => $doc->getSize(),
                'uploaded_by'      => $userEmployeeId,
            ]);

            $propDocType = PropDocType::findOrFail($request->prop_doc_type_id);

            $propDocType->has_uploaded_file = true;
            $propDocType->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($storedPath) && Storage::disk('public')->exists($storedPath)) {
                Storage::disk('public')->deleteDirectory("prop_documents/{$propDoc->id}");
            }

            throw $e;
        }

        return redirect()->route('prop_uploads.index')->with('success', 'Document uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PropDocument $propDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropDocument $propDocument)
    {
        return redirect()->route('prop_uploads.index')->with('warning', 'Work in progress.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropDocument $propDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $prop_upload)
    {
        $propUpload = PropDocument::where('id', $prop_upload)->with([
            'propDocType',
            'uploadedPropDoc'
        ])->get()->first();

        // dd([
        //     'propUploadObj' => $propUpload,
        //     'idFromRequest' => $prop_upload,
        //     'idFromObj' => $propUpload->id,
        // ]);

        $folder = "prop_documents/{$propUpload->id}";

        DB::beginTransaction();

        try {
            $propUpload->propDocType->has_uploaded_file = false;
            $propUpload->propDocType->save();
            $propUpload->uploadedPropDoc->forceDelete();
            $propUpload->forceDelete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        if (Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->deleteDirectory($folder);
        }

        return redirect()->route('prop_uploads.index')->with('success', 'Document deleted successfully.');
    }
}
