<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeAddress extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'employee_joining_id',
        'address_type',
        'street',
        'locality',
        'city',
        'district',
        'post_office',
        'state',
        'pin_code',
        'created_by',
        'updated_by',
    ];

    /* ================= Relationships ================= */
    public function employeeJoining(): BelongsTo // checked from my end
    {
        return $this->belongsTo(EmployeeJoining::class, 'employee_joining_id');
    }

    /* ================= Attributes ================= */
    protected function addressType(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function street(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function locality(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function city(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function district(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function postOffice(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function poststateOffice(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }
}
