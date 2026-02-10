<?php

namespace Database\Seeders;

use App\Models\EducationStandard;
use App\Models\User;
use Illuminate\Database\Seeder;

class EducationStandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $standards = [
            'VIII',
            'X',
            'XII',
            'GRAD',
            'POST-GRAD',
            'DIPLOMA',
        ];

        $suEmployeeId = User::whereHas('role', function ($q) {
            $q->where('slug', 'SU');
        })->value('employee_id');

        foreach ($standards as $name) {
            EducationStandard::updateOrCreate(
                ['name' => $name],
                [
                    'created_by' => $suEmployeeId,
                    'is_system' => true,
                ],
            );
        }
    }
}
