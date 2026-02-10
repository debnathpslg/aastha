<?php

namespace Database\Seeders;

use App\Models\PropDocType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropDocTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $docs = [
            'Photo',
            'Aadhaar',
            'PAN',
            'EPIC',
            'Passport',
            'Trade Licence',
            'Trade Licence (Alt)',
            'GST Certificate',
            'Electricity Bill (Latest)',
            'Cancelled Cheque',
            'Police Clearance Certificate',
            'DRA Certificate',
            'Bank Statement (Last six Month)',
            'ITR (Last 3 Years)',
            'Audited Balancesheet (Last 3 Years)',
            'Audited P&L (Last 3 Years)',
        ];

        $suEmployeeId = User::whereHas('role', function ($q) {
            $q->where('slug', 'SU');
        })->value('employee_id');

        foreach ($docs as $doc) {
            PropDocType::updateOrCreate(
                ['name' => $doc],
                [
                    'created_by' => $suEmployeeId,
                    'is_system' => true,
                ],
            );
        }
    }
}
