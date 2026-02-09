<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportDocType extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'remarks',
        'created_by',
        'updated_by',
    ];

    /* ================= Relationships ================= */
    public function supportDocuments(): HasMany // checked from my end
    {
        return $this->hasMany(SupportDocument::class, 'support_doc_type_id');
    }

    /* ================= Attributes ================= */
    protected function name(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords($value) : null
        );
    }

    protected function remarks(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucfirst($value) : null
        );
    }
}
