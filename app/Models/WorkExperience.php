<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkExperience extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'employee_joining_id',
        'company_name',
        'job_title',
        'work_start_date',
        'work_end_date',
        'manager_feedback',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'work_start_date' => 'date',
        'work_end_date' => 'date',
    ];

    /* ================= Relationships ================= */
    public function employeeJoining(): BelongsTo // checked from my end
    {
        return $this->belongsTo(EmployeeJoining::class, 'employee_joining_id');
    }

    /* ================= Attributes ================= */
    protected function company_name(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function job_title(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function manager_feedback(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }
}
