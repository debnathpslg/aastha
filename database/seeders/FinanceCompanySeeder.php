<?php

namespace Database\Seeders;

use App\Models\FinanceCompany;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FinanceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            ['L&T Financial Services', 'LTFS'],
            ['Hero FinCorp Limited', 'HFCL'],
            ['Tata Capital Limited', 'TCL'],
            ['Bajaj Finserve Limited', 'BFL'],
            ['Akasa Finance Limited', 'AFL'],
            ['Muthoot FinCorp Limited', 'MFL'],
        ];

        $suEmployeeId = User::whereHas('role', function ($q) {
            $q->where('slug', 'SU');
        })->value('employee_id');

        foreach ($companies as [$name, $slug]) {
            FinanceCompany::updateOrCreate(
                ['name' => $name],
                [
                    'created_by' => $suEmployeeId,
                    'slug' => $slug,
                    'is_system' => false,
                ],
            );
        }
    }
}
