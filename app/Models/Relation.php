<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relation extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'is_valid_beneficiary',
        'is_valid_reference',
        'is_system',
        'created_by',
        'updated_by',
    ];

    /* ================= Attributes ================= */
    protected function name(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    /* ================= Relationships ================= */
    public function employeeReferences(): HasMany // checked from my end
    {
        return $this->hasMany(EmployeeReference::class, 'relation_id');
    }
}
