<?php

namespace Database\Seeders;

use App\Models\SupportDocType;
use App\Models\User;
use Illuminate\Database\Seeder;

class SupportDocTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $docs = [
            'Joining Form',
            'Biodata',
            'Photo',
            'Aadhaar',
            'PAN',
            'EPIC',
            'Bank Mandate',
            'PCC',
            'COC',
            'DRA',
            'Passing Cert',
        ];

        $suEmployeeId = User::whereHas('role', function ($q) {
            $q->where('slug', 'SU');
        })->value('employee_id');

        foreach ($docs as $name) {
            SupportDocType::updateOrCreate(
                ['name' => $name],
                ['created_by' => $suEmployeeId],
            );
        }
    }
}
