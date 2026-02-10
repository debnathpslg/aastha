<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agreement extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'company_id',
        'created_by',
        'updated_by',
    ];

    /* ================= Relations ================= */

    public function company(): BelongsTo // checked from my end
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function uploadedAgreements(): HasMany // checked from my end
    {
        return $this->hasMany(UploadedAgreement::class, 'agreement_id');
    }
}
