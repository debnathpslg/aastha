<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportDocument extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'employee_joining_id',
        'support_doc_type_id',
        'is_mandatory',
        'remarks',
        'created_by',
        'updated_by',
    ];

    /* ================= Relationships ================= */
    public function employeeJoining(): BelongsTo // checked from my end
    {
        return $this->belongsTo(EmployeeJoining::class, 'employee_joining_id');
    }

    public function supportDocType(): BelongsTo // checked from my end
    {
        return $this->belongsTo(SupportDocType::class, 'support_doc_type_id');
    }

    public function documentUpload(): HasOne // checked from my end
    {
        return $this->hasOne(DocumentUpload::class, 'support_document_id');
    }

    /* ================= Attributes ================= */
    protected function remarks(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucfirst($value) : null
        );
    }
}
