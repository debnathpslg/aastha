<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationalQualification extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'employee_joining_id',
        'education_standard_id',
        'education_board_id',
        'year_of_passing',
        'remarks',
        'created_by',
        'updated_by',
    ];

    /* ================= Relationships ================= */

    public function employeeJoining(): BelongsTo // checked from my end
    {
        return $this->belongsTo(EmployeeJoining::class, 'employee_joining_id');
    }

    public function educationStandard(): BelongsTo // checked from my end
    {
        return $this->belongsTo(EducationStandard::class, 'education_standard_id');
    }

    public function educationBoard(): BelongsTo // checked from my end
    {
        return $this->belongsTo(EducationBoard::class, 'education_board_id');
    }

    /* ================= Attributes ================= */
    protected function remarks(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucfirst($value) : null
        );
    }
}
