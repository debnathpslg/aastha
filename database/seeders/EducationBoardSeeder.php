<?php

namespace Database\Seeders;

use App\Models\EducationBoard;
use App\Models\User;
use Illuminate\Database\Seeder;

class EducationBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boards = [
            'WBBSE',
            'WBCHSE',
            'CBSE',
            'ICSE',
            'NBU',
        ];

        $suEmployeeId = User::whereHas('role', function ($q) {
            $q->where('slug', 'SU');
        })->value('employee_id');

        foreach ($boards as $name) {
            EducationBoard::updateOrCreate(
                ['name' => $name],
                [
                    'created_by' => $suEmployeeId,
                    'is_system' => true,
                ],
            );
        }
    }
}
