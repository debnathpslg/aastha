<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'is_system',
        'created_by',
        'updated_by',
    ];

    /* ================= Attributes ================= */
    protected function name(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function slug(): Attribute // checked from my end
    {
        return Attribute::make(
            set: fn($value) => $value ? strtoupper($value) : null
        );
    }

    /* ================= Relations ================= */

    public function agreements(): HasMany // checked from my end
    {
        return $this->hasMany(Agreement::class, 'company_id');
    }
}
