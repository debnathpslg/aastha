<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeReference extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'employee_joining_id',
        'relation_id',
        'reference_name',
        'contact_no',
        'address',
        'created_by',
        'updated_by',
    ];

    /* ================= Relationships ================= */

    public function employeeJoining() // checked from my end
    {
        return $this->belongsTo(EmployeeJoining::class, 'employee_joining_id');
    }

    public function relation(): BelongsTo // checked from my end
    {
        return $this->belongsTo(Relation::class, 'relation_id');
    }

    /* ================= Attributes ================= */
    protected function referenceName(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function address(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucfirst(strtolower($value)) : null
        );
    }
}
