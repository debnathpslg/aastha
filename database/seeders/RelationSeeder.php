<?php

namespace Database\Seeders;

use App\Models\Relation;
use App\Models\User;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relations = [
            ['Parent', true, false],
            ['Spouse', true, false],
            ['Sibling', true, false],
            ['Local Guardian', false, true],
            ['Local Body Member', false, true],
            ['Govt/PSU Employee', false, true],
            ['Friend', false, true],
            ['Relative', false, true],
        ];

        $suEmployeeId = User::whereHas('role', function ($q) {
            $q->where('slug', 'SU');
        })->value('employee_id');

        foreach ($relations as [$name, $is_valid_beneficiary, $is_valid_reference]) {
            Relation::updateOrCreate(
                ['name' => $name],
                [
                    'is_valid_beneficiary' => $is_valid_beneficiary,
                    'is_valid_reference' => $is_valid_reference,
                    'created_by' => $suEmployeeId,
                    'is_system' => true,
                ],
            );
        }
    }
}
