<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropDocType extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    
    protected $fillable = [
        'id',
        'name',
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

    /* ================= Relations ================= */

    public function propDocuments(): HasMany // checked from my end
    {
        return $this->hasMany(PropDocument::class, 'prop_doc_type_id');
    }
}
