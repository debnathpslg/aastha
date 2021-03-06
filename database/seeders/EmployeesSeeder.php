<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $emp = new Employee;

        $emp->create([
            'emp_id_no' => 226,
            'emp_id' => 'AAST000226',
            'emp_location' => 2,
            'emp_designation' => 1,
            'emp_name' => 'Partha Debnath',
            'emp_email' => 'partha.aastha@gmail.com',
            'emp_mobile' => '9832356644',
            'emp_ac_holder_name' => 'Partha Debnath',
            'emp_relation' => 1,
            'emp_account_no' => '020801535844',
            'emp_bank_name' => 'Icici Bank Ltd.',
            'emp_bank_branch' => 'Siliguri',
            'emp_bank_ifsc' => 'ICIC0000208',
            'is_active' => true,
            'sal_type' => 0,
            'joined_on' => null,
            'left_on' => null,
        ])->save();
        $emp->create([
            'emp_id_no' => 673,
            'emp_id' => 'AAST000673',
            'emp_location' => 2,
            'emp_designation' => 1,
            'emp_name' => 'Md Alam',
            'emp_email' => 'alam.aastha@gmail.com',
            'emp_mobile' => '9474407312',
            'emp_ac_holder_name' => 'Md Alam',
            'emp_relation' => 1,
            'emp_account_no' => '271601500451',
            'emp_bank_name' => 'Icici Bank Ltd.',
            'emp_bank_branch' => 'Siliguri',
            'emp_bank_ifsc' => 'ICIC0000208',
            'is_active' => true,
            'sal_type' => 0,
            'joined_on' => null,
            'left_on' => null,
        ])->save();
        $emp->create([
            'emp_id_no' => 229,
            'emp_id' => 'AAST000229',
            'emp_location' => 2,
            'emp_designation' => 1,
            'emp_name' => 'Sk Shanewaz Hussain',
            'emp_email' => 'skshanewaz.aastha@gmail.com',
            'emp_mobile' => '9593901016',
            'emp_ac_holder_name' => 'Sk Shanewaz Hussain',
            'emp_relation' => 1,
            'emp_account_no' => '50100467568758',
            'emp_bank_name' => 'Hdfc Bank Ltd.',
            'emp_bank_branch' => 'Islampur',
            'emp_bank_ifsc' => 'HDFC0002747',
            'is_active' => true,
            'sal_type' => 0,
            'joined_on' => null,
            'left_on' => null,
        ])->save();
        $emp->create([
            'emp_id_no' => 227,
            'emp_id' => 'AAST000227',
            'emp_location' => 2,
            'emp_designation' => 1,
            'emp_name' => 'Pravat Sarkar',
            'emp_email' => 'pravat.aastha@gmail.com',
            'emp_mobile' => '9563152800',
            'emp_ac_holder_name' => 'Pravat Sarkar',
            'emp_relation' => 1,
            'emp_account_no' => '739902010006557',
            'emp_bank_name' => 'Uniob Bank of India',
            'emp_bank_branch' => 'Ghughumali',
            'emp_bank_ifsc' => 'UBIN0573990',
            'is_active' => true,
            'sal_type' => 0,
            'joined_on' => null,
            'left_on' => null,
        ])->save();
        $emp->create([
            'emp_id_no' => -1,
            'emp_id' => 'AASTPROP01',
            'emp_location' => 2,
            'emp_designation' => 9,
            'emp_name' => 'Subrata Sarkar',
            'emp_email' => 'aastha.subrata@gmail.com',
            'emp_mobile' => '9933671962',
            'emp_ac_holder_name' => 'Subrata Sarkar',
            'emp_relation' => 1,
            'emp_account_no' => null,
            'emp_bank_name' => 'State Bank of India',
            'emp_bank_branch' => 'Nts More',
            'emp_bank_ifsc' => null,
            'is_active' => true,
            'sal_type' => 0,
            'joined_on' => null,
            'left_on' => null,
        ])->save();
        $emp->create([
            'emp_id_no' => -2,
            'emp_id' => 'AASTPROP02',
            'emp_location' => 2,
            'emp_designation' => 9,
            'emp_name' => 'Koustav Dey',
            'emp_email' => 'koustav.aastha@gmail.com',
            'emp_mobile' => '9933094870',
            'emp_ac_holder_name' => 'Koustav Dey',
            'emp_relation' => 1,
            'emp_account_no' => null,
            'emp_bank_name' => null,
            'emp_bank_branch' => null,
            'emp_bank_ifsc' => null,
            'is_active' => true,
            'sal_type' => 0,
            'joined_on' => null,
            'left_on' => null,
        ])->save();
        $emp->create([
            'emp_id_no' => -7,
            'emp_id' => 'AAST000102',
            'emp_location' => 2,
            'emp_designation' => 9,
            'emp_name' => 'Biswajit Saha',
            'emp_email' => 'aastha.biswa@gmail.com',
            'emp_mobile' => '9654853033',
            'emp_ac_holder_name' => 'Biswajit Saha',
            'emp_relation' => 1,
            'emp_account_no' => null,
            'emp_bank_name' => null,
            'emp_bank_branch' => null,
            'emp_bank_ifsc' => null,
            'is_active' => true,
            'sal_type' => 0,
            'joined_on' => null,
            'left_on' => null,
        ])->save();
    }
}
