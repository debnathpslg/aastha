<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\Location;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index(Request $request, $q = "active")
    {
        $q          = isset($request->q) ? $request->q : "active";
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
                ->paginate(5);

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
            ->paginate(25);

        return view('employee.index', compact([
            'dataSet',
            'activeEmpCount',
            'notApprovedEmpCount',
            'noBankEmpCount',
            'bankChgEmpCount',
            'title',
            'q',
            'loc',
            'desig',
            'searchStr',
            'allLocations',
            'allDesignations',
        ]));
    }

    public function create()
    {
        return view('employee.create');
    }
}
