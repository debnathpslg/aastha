<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeJoining extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'full_name',
        'mobile_no',
        'alternate_mobile_no',
        'email',
        'dob',
        'gender',
        'nationality',
        'marital_status',

        'father_name',
        'local_guardian_name',
        'local_guardian_mobile',
        'local_guardian_relation_id',

        'joining_status',
        'remarks',
        'signed_date',
        'signed_place',

        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'dob' => 'date',
        'signed_date' => 'date',
    ];

    /* ================= Relationships ================= */

    public function employeeAddresses(): HasMany // checked from my end
    {
        return $this->hasMany(EmployeeAddress::class, 'employee_joining_id');
    }

    public function languageKnows(): HasMany // checked from my end
    {
        return $this->hasMany(LanguageKnow::class, 'employee_joining_id');
    }

    public function localGuardianRelation(): BelongsTo // checked from my end
    {
        return $this->belongsTo(Relation::class, 'local_guardian_relation_id');
    }

    public function educationalQualifications(): HasMany // checked from my end
    {
        return $this->hasMany(EducationalQualification::class, 'employee_joining_id');
    }

    public function workExperiences(): HasMany // checked from my end
    {
        return $this->hasMany(WorkExperience::class, 'employee_joining_id');
    }

    public function employeeReferences(): HasMany // checked from my end
    {
        return $this->hasMany(EmployeeReference::class, 'employee_joining_id');
    }

    public function supportDocuments(): HasMany // checked from my end
    {
        return $this->hasMany(SupportDocument::class, 'employee_joining_id');
    }

    /* ================= Attributes ================= */
    protected function fullName(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function email(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? strtolower($value) : null
        );
    }

    protected function gender(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function nationality(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function maritalStatus(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function fatherName(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function localGuardianName(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function joiningStatus(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function remarks(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucfirst(strtolower($value)) : null
        );
    }

    protected function signedPlace(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }
}
