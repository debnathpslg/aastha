<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('employees')
            ->join('locations', 'employees.emp_location', '=', 'locations.id')
            ->join('designations', 'employees.emp_designation', '=', 'designations.id')
            ->join('relations', 'employees.emp_relation', '=', 'relations.id')
            ->where('employees.is_active', '=', '1')
            ->select(
                'employees.emp_id',
                'locations.location_name',
                'designations.designation',
                'employees.emp_name',
                'employees.emp_email',
                'employees.emp_mobile',
                'employees.emp_ac_holder_name',
                'relations.relation',
                'employees.emp_account_no',
                'employees.emp_bank_name',
                'employees.emp_bank_branch',
                'employees.emp_bank_ifsc',
            )->get();
    }

    public function headings(): array
    {
        return ([
            //
            'Employee Id',
            'Location',
            'Designation',
            'Name',
            'Email',
            'Mobile',
            'A/c Holder Name',
            'Relation with A/c Holder',
            'A/c No',
            'Bank Name',
            'Branch Name',
            'IFSC',
        ]);
    }
}
