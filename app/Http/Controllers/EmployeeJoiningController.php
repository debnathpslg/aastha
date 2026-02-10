<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Relation;
use Illuminate\Http\Request;
use App\Models\DocumentUpload;
use App\Models\EducationBoard;
use App\Models\SupportDocType;
use App\Models\EmployeeJoining;
use App\Models\SupportDocument;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EducationStandard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmployeeJoiningController extends Controller
{
    public function index(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => 'Employee Onboarding',
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'HR',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Employee',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Onboarding',
                ],
            ],
        ];

        // $query = EmployeeJoining::query()
        //     ->with([
        //         // lightweight relations only
        //         'addresses',
        //     ])
        //     ->withTrashed() // audit purpose
        //     ->orderByDesc('created_at');

        // // 🔜 future filters (hook only, no UI yet)
        // if ($request->filled('status')) {
        //     $query->where('joining_status', $request->status);
        // }

        // if ($request->filled('q')) {
        //     $query->where(function ($q) use ($request) {
        //         $q->where('full_name', 'like', '%' . $request->q . '%')
        //             ->orWhere('mobile_no', 'like', '%' . $request->q . '%');
        //     });
        // }

        // $employeeJoinings = $query->paginate(15)->withQueryString();

        $employeeJoinings = EmployeeJoining::with([
            'employeeAddresses',
            'languageKnows',
            'educationalQualifications',
            'localGuardianRelation',
            'workExperiences',
            'employeeReferences',
            'supportDocuments',
        ])
            ->withTrashed()
            ->orderByDesc('created_at')
            ->get();

        return view('EmployeeJoining.index', compact('employeeJoinings', 'breadCrumbProps'));
    }

    public function create(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => 'Employee Onboarding',
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'HR',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Employee',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Onboarding',
                    'url' => route('onboardings.index'),
                ],
                [
                    'label' => 'Create',
                ],
            ],
        ];

        $relations = Relation::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();

        $languages = Language::query()
            ->whereIn('name', ['Bengali', 'English', 'Hindi', 'Assamese'])
            ->pluck('name', 'id')
            ->toArray();

        $educationStds = EducationStandard::all()->pluck('name', 'id')->toArray();
        $educationBoards = EducationBoard::all()->pluck('name', 'id')->toArray();
        $supportDocTypes = SupportDocType::all()->pluck('name', 'id')->toArray();

        $photoDocType = SupportDocType::query()
            ->where('name', 'Photo')->first();

        // dd($photoDocType->id);

        return view('EmployeeJoining.create', compact([
            'breadCrumbProps',
            'relations',
            'languages',
            'educationStds',
            'educationBoards',
            'supportDocTypes',
            'photoDocType',

        ]));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                /* ================= BASIC INFO ================= */
                'full_name' => 'required|string|max:150',
                'mobile_no' => 'required|string|max:20',
                'alternate_mobile_no' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:150',
                'dob' => 'required|date',
                'gender' => 'required|in:Male,Female,Other',
                'marital_status' => 'required|in:Single,Married,Divorced',
                'nationality' => 'required|string|max:50',

                /* ================= GUARDIAN ================= */
                'father_name' => 'required|string|max:150',
                'local_guardian_name' => 'required|string|max:150',
                'local_guardian_mobile' => 'required|string|max:20',
                'local_guardian_relation_id' => 'required|exists:relations,id',

                /* ================= PRESENT ADDRESS ================= */
                'present.street' => 'required|string|max:150',
                'present.city' => 'required|string|max:100',
                'present.state' => 'required|string|max:100',
                'present.pin_code' => 'required|string|max:10',

                /* ================= PERMANENT ADDRESS ================= */
                'permanent.street' => 'required|string|max:150',
                'permanent.city' => 'required|string|max:100',
                'permanent.state' => 'required|string|max:100',
                'permanent.pin_code' => 'required|string|max:10',

                /* ================= LANGUAGES ================= */
                'languages' => 'required|array|min:1',
                'languages.*' => 'array',
                'languages.*.can_understand' => 'nullable|boolean',
                'languages.*.can_speak' => 'nullable|boolean',
                'languages.*.can_read' => 'nullable|boolean',
                'languages.*.can_write' => 'nullable|boolean',

                /* ================= EDUCATION (HIGHEST) ================= */
                'education_standard_id' => 'required|exists:education_standards,id',
                'education_board_id' => 'required|exists:education_boards,id',
                'year_of_passing' => 'required|digits:4',
                'remarks' => 'nullable|string|max:100',

                /* ================= WORK EXPERIENCE (OPTIONAL) ================= */
                'experiences' => 'nullable|array',
                'experiences.*.company_name' => 'nullable|string|max:150',
                'experiences.*.job_title' => 'nullable|string|max:150',
                'experiences.*.work_start_date' => 'nullable|date',
                'experiences.*.work_end_date' => 'nullable|date|after_or_equal:experiences.*.work_start_date',

                /* ================= SUPPORT DOCUMENTS (PHOTO ONLY) ================= */
                'documents' => 'required|array|min:1',

                // Photo must be index 0
                'documents.0.support_doc_type_id' => 'required|exists:support_doc_types,id',
                'documents.0.file' => 'required|file|mimes:jpg,jpeg,png,pdf,gif|max:200',
                // 'documents.0.remarks'   => 'nullable|string|max:255',

            ],
            [
                'documents.0.file.required' => 'Employee photo is mandatory for onboarding.',
            ]
        );

        // dd($request);

        DB::transaction(
            function () use ($request) {
                $userEmployeeId = Auth::user()->employee_id;

                $joining = EmployeeJoining::create(
                    [
                        'full_name' => $request->full_name,
                        'mobile_no' => $request->mobile_no,
                        'alternate_mobile_no' => $request->alternate_mobile_no,
                        'email' => $request->email,
                        'dob' => $request->dob,
                        'gender' => $request->gender,
                        'marital_status' => $request->marital_status,
                        'nationality' => $request->nationality,

                        'father_name' => $request->father_name,
                        'local_guardian_name' => $request->local_guardian_name,
                        'local_guardian_mobile' => $request->local_guardian_mobile,
                        'local_guardian_relation_id' => $request->local_guardian_relation_id,

                        'signed_date' => now(),
                        'signed_place' => 'Siliguri',

                        'created_by' => $userEmployeeId,
                    ]
                );

                $joining->employeeAddresses()->createMany([
                    [
                        'address_type' => 'PRESENT',
                        ...$request->present,
                        'created_by' => $userEmployeeId,
                    ],
                    [
                        'address_type' => 'PERMANENT',
                        ...$request->permanent,
                        'created_by' => $userEmployeeId,
                    ],
                ]);

                /* ================= 3️⃣ LANGUAGES ================= */
                foreach ($request->languages as $languageId => $skills) {

                    if (empty(array_filter((array) $skills))) {
                        continue;
                    }

                    $joining->languageKnows()->create([
                        'language_id' => $languageId,
                        'can_understand' => ! empty($skills['can_understand']),
                        'can_speak' => ! empty($skills['can_speak']),
                        'can_read' => ! empty($skills['can_read']),
                        'can_write' => ! empty($skills['can_write']),
                        'created_by' => $userEmployeeId,
                    ]);
                }

                /* ================= 4️⃣ EDUCATION (HIGHEST) ================= */
                // $edu = $request->education;

                $joining->educationalQualifications()->create([
                    'education_standard_id' => $request->education_standard_id,
                    'education_board_id' => $request->education_board_id,
                    'year_of_passing' => $request->year_of_passing,
                    'remarks' => $request->remarks ?? null,
                    'created_by' => $userEmployeeId,
                ]);

                /* ================= 5️⃣ WORK EXPERIENCE (OPTIONAL) ================= */
                // if ($request->filled('experiences')) {
                //     foreach ($request->experiences as $exp) {
                //         if (empty(array_filter($exp))) {
                //             continue;
                //         }

                //         $joining->workExperiences()->create([
                //             ...$exp,
                //             'created_by' => $userEmployeeId,
                //         ]);
                //     }
                // }

                /* ================= 6️⃣ SUPPORT DOCUMENTS (PHOTO ONLY) ================= */
                $doc = $request->documents[0];

                $supportDoc = SupportDocument::create([
                    'employee_joining_id' => $joining->id,
                    'support_doc_type_id' => $doc['support_doc_type_id'],
                    'remarks' => $doc['remarks'] ?? null,
                    'created_by' => $userEmployeeId,
                ]);

                $folder = "employee_onboarding_docs/{$joining->id}";
                $storedPath = $doc['file']->store($folder, 'public');

                DocumentUpload::create([
                    'support_document_id' => $supportDoc->id,
                    'file_path' => $storedPath,
                    'file_name' => $doc['file']->getClientOriginalName(),
                    'mime_type' => $doc['file']->getClientMimeType(),
                    'file_size' => $doc['file']->getSize(),
                    'uploaded_by' => $userEmployeeId,
                ]);
            }
        );
        // dd($request);

        // 🚫 NO DB WRITE YET
        // return back()->with('success', 'Validation passed successfully.');

        return redirect()
            ->route('onboardings.index')
            ->with('success', 'Employee onboarding completed successfully.');
    }

    public function preview(Request $request, EmployeeJoining $employeeJoining)
    {
        $employeeJoining->load([
            'employeeAddresses',
            'languageKnows',
            'languageKnows.language',
            'localGuardianRelation',
            'educationalQualifications',
            'educationalQualifications.educationStandard',
            'educationalQualifications.educationBoard',
            'workExperiences',
            'employeeReferences',
            'employeeReferences.relation',
            'supportDocuments',
            'supportDocuments.supportDocType',
            'supportDocuments.documentUpload'
        ]);

        $qrPayload = json_encode([
            'employee_joining_id' => $employeeJoining->id,
            'signed_date' => $employeeJoining->signed_date,
            'checksum' => hash(
                'sha256',
                $employeeJoining->id . '|' . $employeeJoining->signed_date
            ),
        ]);

        return view('EmployeeJoining.preview', compact('employeeJoining', 'qrPayload'));
    }

    public function pdf(Request $request, EmployeeJoining $employeeJoining)
    {
        $employeeJoining->load([
            'employeeAddresses',
            'languageKnows',
            'languageKnows.language',
            'localGuardianRelation',
            'educationalQualifications',
            'educationalQualifications.educationStandard',
            'educationalQualifications.educationBoard',
            'workExperiences',
            'employeeReferences',
            'employeeReferences.relation',
            'supportDocuments',
            'supportDocuments.supportDocType',
            'supportDocuments.documentUpload'
        ]);

        $qrPayload = json_encode([
            'employee_joining_id' => $employeeJoining->id,
            'signed_date' => $employeeJoining->signed_date,
            'checksum' => hash(
                'sha256',
                $employeeJoining->id . '|' . $employeeJoining->signed_date
            ),
        ]);

        $pdf = Pdf::loadView(
            'EmployeeJoining.pdf',
            compact('employeeJoining', 'qrPayload')
        )->setPaper('A4');

        return $pdf->download(
            'Employee_Onboarding_' . $employeeJoining->full_name . '.pdf'
        );
    }
}
