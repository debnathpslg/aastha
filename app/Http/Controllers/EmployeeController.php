<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Relation;
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

                return view('employee.list', [
                    'callingMethod' => $callingMethod,
                    'title' => $title,
                    'employees' => $employees,
                ]);
            } elseif ($callingMethod == 'deactive') {
                if ($currentUser->user_role > 4) {
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

                    return view('employee.list', [
                        'callingMethod' => $callingMethod,
                        'title' => $title,
                        'employees' => $employees,
                    ]);
                }
            }
        }
        return redirect()->route('homePage');
    }

    function searchEmp(Request $request)
    {
        if (Session::has('current_user')) {
            $currentUser = Session::get('current_user');

            if (!isset($request->callingMethod) || $request->callingMethod == 'active') {

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

                $title = "List from active Employees matching '" . trim($request->searchitem) . "'";

                return view('employee.list', [
                    'callingMethod' => $request->callingMethod,
                    'title' => $title,
                    'employees' => $employees,
                ]);
            } elseif ($request->callingMethod == 'deactive') {
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

                    $title = "List from deactive Employees matching '" . trim($request->searchitem) . "'";

                    return view('employee.list', [
                        'callingMethod' => $request->callingMethod,
                        'title' => $title,
                        'employees' => $employees,
                    ]);
                }
            }
        }

        return redirect()->route('homePage');
    }

    function exportEmployeeData()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }

    function createNewEmployee()
    {

        $currentUser = Session::get('current_user');

        if (!isset($currentUser) || $currentUser->user_role < 4) {
            return redirect()->route('homePage');
        } else {
            $locations = Location::where('id', '>', '1')->get();
            $designations = Designation::all();
            $relations = Relation::all();

            return view('employee.new', [
                'locations' => $locations,
                'designations' => $designations,
                'relations' => $relations
            ]);
        }
    }

    function submitNewEmpData(Request $request)
    {
        $currentUser = $request->session()->get('current_user');

        $request->validate(
            [
                'emp_name' => 'required|min:6|max:50|unique:employees,emp_name',
                'emp_location' => 'gt:0',
                'emp_designation' => 'gt:0',
                'emp_mobile' => 'required|numeric|digits:10|unique:employees,emp_mobile',
                'emp_email' => 'required|regex:/(.+)@(.+)\.(.+)/i|min:6|max:50|unique:employees,emp_email',
                'emp_ac_holder_name' => 'required|min:6|max:50',
                'emp_account_no' => 'required|min:9',
                'conf_ac_no' => 'required|min:9|same:emp_account_no',
                'emp_bank_name' => 'required|min:3',
                'emp_bank_branch' => 'required|min:3',
                'emp_bank_ifsc' => 'required|size:11',
            ],
            [
                'emp_name.required' => "Employee name cannot be blank.",
                'emp_name.min' => 'Employee name must contain atleast 6 characters.',
                'emp_name.max' => 'Employee name cannot exceed 50 characters.',
                'emp_name.unique' => 'Employee name already exists. Please add an identifier to distinguish it from existing.',
                'emp_location.gt' => 'Please select location.',
                'emp_designation.gt' => 'Please select designation.',
                'emp_mobile.required' => 'Mobile no. cannot be blank.',
                'emp_mobile.numeric' => 'Only numbers are allowed.',
                'emp_mobile.digits' => 'Mobile number should be exactly 10 digits.',
                'emp_mobile.unique' => 'Mobile number already recorded for an existing employee.',
                'emp_email.required' => 'Email cannot be left blank.',
                'emp_email.regex' => 'Invalid email format.',
                'emp_email.min' => 'Email must contain atleast 6 characters.',
                'emp_email.max' => 'Email must be 50 characters or less.',
                'emp_email.unique' => 'Email number already recorded for an existing employee.',
                'emp_ac_holder_name.required' => 'A/c holder name cannot be blank.',
                'emp_ac_holder_name.min' => 'A/c holder name must contain atleast 6 characters.',
                'emp_ac_holder_name.max' => 'A/c holder name must be 50 characters or less.',
                'emp_account_no.required' => 'A/c number cannot be blank.',
                'emp_account_no.min' => 'A/c number must contain atleast 9 characters.',
                'conf_ac_no.required' => 'Confirm A/c number cannot be blank.',
                'conf_ac_no.min' => 'Confirm A/c number must contain atleast 9 characters.',
                'conf_ac_no.same' => 'A/c number and Confirm A/c number do not match.',
                'emp_bank_name.required' => 'Bank name cannot be blank.',
                'emp_bank_name.min' => 'Bank name must contain atleast 9 characters.',
                'emp_bank_branch.required' => 'Branch name cannot be blank.',
                'emp_bank_branch.min' => 'Branch name must contain atleast 9 characters.',
                'emp_bank_ifsc.required' => 'IFSC cannot be blank.',
                'emp_bank_ifsc.size' => 'IFSC must contain exactly 11 alphanumeric characters.',
            ],
        );

        $newEmployee = new Employee;

        $newEmployee->emp_id_no = Employee::max('emp_id_no') + 1;
        $newEmployee->emp_id = "AAST" . str_pad($newEmployee->emp_id_no, 6, '0', STR_PAD_LEFT);
        $newEmployee->emp_location = $request->emp_location;
        $newEmployee->emp_designation = $request->emp_designation;
        $newEmployee->emp_name = ucwords(strtolower($request->emp_name));
        $newEmployee->emp_email = strtolower($request->emp_email);
        $newEmployee->emp_mobile = $request->emp_mobile;
        $newEmployee->emp_ac_holder_name = ucwords(strtolower($request->emp_ac_holder_name));
        $newEmployee->emp_relation = $request->emp_relation;
        $newEmployee->emp_account_no = "'" . $request->emp_account_no;
        $newEmployee->emp_bank_name = ucwords(strtolower($request->emp_bank_name));
        $newEmployee->emp_bank_branch = ucwords(strtolower($request->emp_bank_branch));
        $newEmployee->emp_bank_ifsc = strtoupper($request->emp_bank_ifsc);
        $newEmployee->is_active = true;
        $newEmployee->is_deleted = false;
        $newEmployee->sal_type = 0;
        $newEmployee->joined_on = Carbon::now();
        $newEmployee->left_on = null;
        $newEmployee->created_by = $currentUser->emp_id;
        $newEmployee->last_modified_by = $currentUser->emp_id;

        try {
            $newEmployee->save();

            return redirect()->route('createNewEmployee')->withErrors(['success' => 'Employee created successfully.']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['sqlError' => $e->getMessage()]);
        }
    }

    function editEmpData($id = null, $callingMethod = null)
    {
        $currentUser = Session::get('current_user');

        if (!isset($currentUser) || $currentUser->user_role < 5) {
            return redirect('homePage');
        } else {
            $roles = Role::all();
            $designations = Designation::all();
            $relations = Relation::all();
            $locations = Location::where('id', '>', '1')->get();

            $employee = Employee::find($id);

            if (!isset($employee)) return redirect()->back();

            return view('employee.edit', [
                'callingMethod' => $callingMethod,
                'roles' => $roles,
                'designations' => $designations,
                'relations' => $relations,
                'employee' => $employee,
                'locations' => $locations
            ]);
        }
    }

    function submitEditedEmployee(Request $request)
    {
        return $request;
    }
}
