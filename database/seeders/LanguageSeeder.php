<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            'Bengali',
            'Hindi',
            'English',
            'Assamese',
        ];

        $suEmployeeId = User::whereHas('role', function ($q) {
            $q->where('slug', 'SU');
        })->value('employee_id');

        foreach ($languages as $name) {
            Language::updateOrCreate(
                ['name' => $name],
                [
                    'created_by' => $suEmployeeId,
                    'is_system' => true,
                ],
            );
        }
    }
}
