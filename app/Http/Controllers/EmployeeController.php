<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\Ifsc;
use App\Models\Location;
use App\Models\Relationship;
use App\Models\WorkStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    //
    public function index(Request $request, $q = "active")
    {
        $loc        = isset($request->loc) ? $request->loc : "";
        $desig      = isset($request->desig) ? $request->desig : "";
        $searchStr  = isset($request->searchStr) ? $request->searchStr : "";

        $allLocations = Location::all()->sortBy('name');
        $allDesignations = Designation::all()->sortBy('name');

        if ($q == 'notapprove') {
            $dataSet = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
                ->where('is_authorised', 0)
                ->whereHas('workStatus', function ($qry1) {
                    $qry1->where('name', 'Active');
                })
                ->whereHas('location', function ($qry2) use ($loc) {
                    $qry2->where('name', 'LIKE', "%{$loc}%");
                })
                ->whereHas('designation', function ($qry3) use ($desig) {
                    $qry3->where('name', 'LIKE', "%{$desig}%");
                })
                ->where(function ($qry4) use ($searchStr) {
                    $qry4->where('employee_name', 'LIKE', "%{$searchStr}%")
                        ->orWhere('email', 'LIKE', "%{$searchStr}%")
                        ->orWhere('employee_code', 'LIKE', "%{$searchStr}%")
                        ->orWhere('mobile_no', 'LIKE', "%{$searchStr}%");
                })
                ->orderBy("employee_name")
                ->paginate(25);

            $title = "List of Not Approved Employees";
        } elseif ($q == 'nobank') {
            $dataSet = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
                ->where('is_authorised', 1)
                ->whereHas('workStatus', function ($qry1) {
                    $qry1->where('name', 'Active');
                })
                ->whereHas('location', function ($qry2) use ($loc) {
                    $qry2->where('name', 'LIKE', "%{$loc}%");
                })
                ->whereHas('designation', function ($qry3) use ($desig) {
                    $qry3->where('name', 'LIKE', "%{$desig}%");
                })
                ->where(function ($qry4) use ($searchStr) {
                    $qry4->where('employee_name', 'LIKE', "%{$searchStr}%")
                        ->orWhere('email', 'LIKE', "%{$searchStr}%")
                        ->orWhere('employee_code', 'LIKE', "%{$searchStr}%")
                        ->orWhere('mobile_no', 'LIKE', "%{$searchStr}%");
                })
                ->where(function ($query) {
                    $query->where('account_holder_name', '=', "")
                        ->orWhere('account_number', '=', "")
                        ->orWhere('relationship_id', '=', null)
                        ->orWhere('ifsc_id', '=', null);
                })
                ->orderBy("employee_name")
                ->paginate(25);

            $title = "List of Employees With Empty Bank Details";
        } elseif ($q == 'bankchange') {
            $dataSet = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
                ->where('is_authorised', 1)
                ->where('is_bank_changed', 1)
                ->whereHas('workStatus', function ($qry1) {
                    $qry1->where('name', 'Active');
                })
                ->whereHas('location', function ($qry2) use ($loc) {
                    $qry2->where('name', 'LIKE', "%{$loc}%");
                })
                ->whereHas('designation', function ($qry3) use ($desig) {
                    $qry3->where('name', 'LIKE', "%{$desig}%");
                })
                ->where(function ($qry4) use ($searchStr) {
                    $qry4->where('employee_name', 'LIKE', "%{$searchStr}%")
                        ->orWhere('email', 'LIKE', "%{$searchStr}%")
                        ->orWhere('employee_code', 'LIKE', "%{$searchStr}%")
                        ->orWhere('mobile_no', 'LIKE', "%{$searchStr}%");
                })
                ->orderBy("employee_name")
                ->paginate(25);

            $title = "List of Employees With Changed Bank Account";
        } else {
            $dataSet = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
                ->where('is_authorised', 1)
                ->whereHas('workStatus', function ($qry1) {
                    $qry1->where('name', 'Active');
                })
                ->whereHas('location', function ($qry2) use ($loc) {
                    $qry2->where('name', 'LIKE', "%{$loc}%");
                })
                ->whereHas('designation', function ($qry3) use ($desig) {
                    $qry3->where('name', 'LIKE', "%{$desig}%");
                })
                ->where(function ($qry4) use ($searchStr) {
                    $qry4->where('employee_name', 'LIKE', "%{$searchStr}%")
                        ->orWhere('email', 'LIKE', "%{$searchStr}%")
                        ->orWhere('employee_code', 'LIKE', "%{$searchStr}%")
                        ->orWhere('mobile_no', 'LIKE', "%{$searchStr}%");
                })
                ->orderBy("employee_name")
                ->paginate(25);

            $title = "List of Active Employees";
        }

        $params = array('loc' => $loc, 'desig' => $desig, 'searchStr' => $searchStr);

        $activeEmpCount = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
            ->where('is_authorised', 1)
            ->whereHas('workStatus', function ($qry1) {
                $qry1->where('name', 'Active');
            })
            ->orderBy("employee_name")
            ->count();

        $notApprovedEmpCount = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
            ->where('is_authorised', 0)
            ->whereHas('workStatus', function ($qry1) {
                $qry1->where('name', 'Active');
            })
            ->orderBy("employee_name")
            ->count();

        $noBankEmpCount = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
            ->where('is_authorised', 1)
            ->whereHas('workStatus', function ($qry1) {
                $qry1->where('name', 'Active');
            })
            ->where(function ($query) {
                $query->where('account_holder_name', '=', "")
                    ->orWhere('account_number', '=', "")
                    ->orWhere('relationship_id', '=', null)
                    ->orWhere('ifsc_id', '=', null);
            })
            ->orderBy("employee_name")
            ->count();

        $bankChgEmpCount = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
            ->where('is_authorised', 1)
            ->where('is_bank_changed', 1)
            ->whereHas('workStatus', function ($qry1) {
                $qry1->where('name', 'Active');
            })
            ->orderBy("employee_name")
            ->count();

        return view('employee.index', compact([
            'dataSet',
            'activeEmpCount',
            'notApprovedEmpCount',
            'noBankEmpCount',
            'bankChgEmpCount',
            'title',
            'q',
            'allLocations',
            'allDesignations',
            'params',
        ]));
    }

    public function create()
    {
        $allWorkStatuses    = WorkStatus::where('name', 'Active')->first();
        $allLocations       = Location::all()->sortBy('name');
        $allDesignations    = Designation::all()->sortBy('name');
        $allRelations       = Relationship::all()->sortBy('name');

        return view('employee.create', compact([
            'allWorkStatuses',
            'allLocations',
            'allDesignations',
            'allRelations',
        ]));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'location_id'           => 'bail|required',
            'designation_id'        => 'bail|required',
            'employee_name'         => 'bail|required|max:100|min:5',
            'pin'                   => 'bail|numeric|max:999999',
            'email'                 => 'bail|required|email|max:100|min:8|unique:employees,email',
            'mobile_no'             => 'bail|required|max:10|min:10|unique:employees,mobile_no',
            'alternate_no'          => 'bail|max:10',
            'office_mobile_no'      => 'bail|max:10',
            'account_holder_name'   => 'bail|required|max:100|min:10',
            'relationship_id'       => 'bail|required',
            'ifsc_id'               => 'bail|required|max:11|min:11|exists:ifscs,ifsc',
            'account_number'        => 'bail|required|confirmed|max:25',
        ]);

        $emp = new Employee();

        $emp->employee_code             = '1000000';
        $emp->work_status_id            = WorkStatus::where('name', 'Active')->first()->id;
        $emp->location_id               = $request->location_id;
        $emp->designation_id            = $request->designation_id;
        $emp->employee_name             = ucwords(strtolower($request->employee_name));
        $emp->fathers_name              = ucwords(strtolower($request->fathers_name));
        $emp->address                   = ucwords(strtolower($request->address));
        $emp->pin                       = strtoupper($request->pin);
        $emp->email                     = strtolower($request->email);
        $emp->mobile_no                 = $request->mobile_no;
        $emp->alternate_no              = $request->alternate_no;
        $emp->office_mobile_no          = $request->office_mobile_no;
        $emp->date_of_birth             = $request->date_of_birth;
        $emp->date_of_join              = $request->date_of_join;
        $emp->date_of_resignation       = $request->date_of_resignation;
        $emp->local_guardian_name       = ucwords(strtolower($request->local_guardian_name));
        $emp->local_guardian_contact_no = $request->local_guardian_contact_no;
        $emp->account_holder_name       = ucwords(strtolower($request->account_holder_name));
        $emp->relationship_id           = $request->relationship_id;
        $emp->account_number            = $request->account_number;
        $emp->ifsc_id                   = Ifsc::where('ifsc', $request->ifsc_id)->first()->id;
        $emp->aadhaar_no                = $request->aadhaar_no;
        $emp->pan_no                    = $request->pan_no;
        $emp->is_authorised             = false;
        $emp->is_bank_changed           = false;
        $emp->created_by_id             = Auth::id();

        $emp->save();

        $ra = RecentActivity::make([
            'user_id'   => Auth::id(),
            'title'     => "Employee Creation",
            'content'   => Auth::user()->name . " joined " . $emp->employee_name . ". Admin authorisation pending.",
            'component' => "EMPLOYEE",
            'bs_colour' => 'success',
        ]);
        $ra->save();

        $request->session()->flash("success", "New Employee '{$emp->employee_name}' created successfully.");

        return redirect()->route('employee.index', 'notapprove');
    }

    public function showEmpBankDetails(Request $request, $id, $q)
    {
        //
        $dataSet = Employee::with(['workStatus', 'location', 'designation', 'relationship', 'ifsc', 'createdBy'])
            ->where('id', $id)
            ->whereHas('workStatus', function ($qry1) {
                $qry1->where('name', 'Active');
            })
            ->first();

        return view('employee.showbank', compact(['dataSet', 'q']));
    }
}
