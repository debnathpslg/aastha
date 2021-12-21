<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    //
    function listEmp($callingMethod)
    {
        //
        if (Session::has('current_user')) {
            $currentUser = Session::get('current_user');

            if (!isset($callingMethod) || $callingMethod == 'active') {
                //
                $employees = DB::table('employees')
                    ->join('locations', 'employees.emp_location', '=', 'locations.id')
                    ->join('designations', 'employees.emp_designation', '=', 'designations.id')
                    ->join('relations', 'employees.emp_relation', '=', 'relations.id')
                    ->where('employees.is_active', '=', '1')
                    ->select(
                        'employees.id as id',
                        'employees.emp_id as eid',
                        'locations.location_name as eloc',
                        'designations.designation as edesig',
                        'employees.emp_name as ename',
                        'employees.emp_email as eemail',
                        'employees.emp_mobile as emob',
                        'employees.emp_ac_holder_name as eahname',
                        'relations.relation as erel',
                        'employees.emp_account_no as eacno',
                        'employees.emp_bank_name as ebank',
                        'employees.emp_bank_branch as ebranch',
                        'employees.emp_bank_ifsc as eifsc'
                    )
                    ->orderBy('ename')
                    ->paginate(20);

                $title = 'List of Employees';
            } else {
                $employees = DB::table('employees')
                    ->join('locations', 'employees.emp_location', '=', 'locations.id')
                    ->join('designations', 'employees.emp_designation', '=', 'designations.id')
                    ->join('relations', 'employees.emp_relation', '=', 'relations.id')
                    ->where('employees.is_active', '=', '0')
                    ->select(
                        'employees.id as id',
                        'employees.emp_id as eid',
                        'locations.location_name as eloc',
                        'designations.designation as edesig',
                        'employees.emp_name as ename',
                        'employees.emp_email as eemail',
                        'employees.emp_mobile as emob',
                        'employees.emp_ac_holder_name as eahname',
                        'relations.relation as erel',
                        'employees.emp_account_no as eacno',
                        'employees.emp_bank_name as ebank',
                        'employees.emp_bank_branch as ebranch',
                        'employees.emp_bank_ifsc as eifsc'
                    )
                    ->orderBy('ename')
                    ->paginate(20);

                $title = 'List of deactive Employees';
            }
        } else {
            return redirect()->route('homePage');
        }

        return view('employee.list', [
            'callingMethod' => $callingMethod,
            'title' => $title,
            'employees' => $employees,
        ]);
    }

    function searchEmp(Request $request)
    {
        if (Session::has('current_user')) {
            $currentUser = Session::get('current_user');

            if (!isset($callingMethod) || $callingMethod == 'active') {

                $employees = DB::table('employees')
                    ->join('locations', 'employees.emp_location', '=', 'locations.id')
                    ->join('designations', 'employees.emp_designation', '=', 'designations.id')
                    ->join('relations', 'employees.emp_relation', '=', 'relations.id')
                    ->where('employees.is_active', '=', '1')
                    ->where(function ($query) use ($request) {
                        $query->where('employees.emp_id', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('employees.emp_name', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('employees.emp_mobile', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('employees.emp_ac_holder_name', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('employees.emp_account_no', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('employees.emp_bank_name', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('employees.emp_bank_branch', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('employees.emp_bank_ifsc', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('locations.location_name', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('designations.designation', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('relations.relation', 'like', '%' . $request->searchitem . '%')
                            ->orWhere('employees.emp_email', 'like', '%' . $request->searchitem . '%');
                    })
                    ->select(
                        'employees.id as id',
                        'employees.emp_id as eid',
                        'locations.location_name as eloc',
                        'designations.designation as edesig',
                        'employees.emp_name as ename',
                        'employees.emp_email as eemail',
                        'employees.emp_mobile as emob',
                        'employees.emp_ac_holder_name as eahname',
                        'relations.relation as erel',
                        'employees.emp_account_no as eacno',
                        'employees.emp_bank_name as ebank',
                        'employees.emp_bank_branch as ebranch',
                        'employees.emp_bank_ifsc as eifsc'
                    )
                    ->orderBy('ename')
                    ->paginate(20);

                $title = 'List of active Employees matching ' . trim($request->searchitem);
            } else {
                if ($currentUser->user_role > 4) {
                    $employees = DB::table('employees')
                        ->join('locations', 'employees.emp_location', '=', 'locations.id')
                        ->join('designations', 'employees.emp_designation', '=', 'designations.id')
                        ->join('relations', 'employees.emp_relation', '=', 'relations.id')
                        ->where('employees.is_active', '=', '0')
                        ->where(function ($query) use ($request) {
                            $query->where('employees.emp_id', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('employees.emp_name', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('employees.emp_mobile', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('employees.emp_ac_holder_name', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('employees.emp_account_no', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('employees.emp_bank_name', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('employees.emp_bank_branch', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('employees.emp_bank_ifsc', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('locations.location_name', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('designations.designation', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('relations.relation', 'like', '%' . $request->searchitem . '%')
                                ->orWhere('employees.emp_email', 'like', '%' . $request->searchitem . '%');
                        })
                        ->select(
                            'employees.id as id',
                            'employees.emp_id as eid',
                            'locations.location_name as eloc',
                            'designations.designation as edesig',
                            'employees.emp_name as ename',
                            'employees.emp_email as eemail',
                            'employees.emp_mobile as emob',
                            'employees.emp_ac_holder_name as eahname',
                            'relations.relation as erel',
                            'employees.emp_account_no as eacno',
                            'employees.emp_bank_name as ebank',
                            'employees.emp_bank_branch as ebranch',
                            'employees.emp_bank_ifsc as eifsc'
                        )
                        ->orderBy('ename')
                        ->paginate(20);

                    $title = 'List of deactive Employees matching ' . trim($request->searchitem);
                } else {
                    return redirect()->route('homePage');
                }
            }
        } else {
            return redirect()->route('homePage');
        }

        return view('employee.list', [
            'callingMethod' => $request->callingMethod,
            'title' => $title,
            'employees' => $employees,
        ]);
    }

    function exportEmployeeData()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
}
