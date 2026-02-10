<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadedAgreement extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'agreement_id',
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
        'uploaded_by',
    ];

    /* ================= Relationships ================= */

    public function agreement(): BelongsTo // checked from my end
    {
        return $this->belongsTo(Agreement::class, 'agreement_id');
    }
}
