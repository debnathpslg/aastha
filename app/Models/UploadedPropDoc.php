<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadedPropDoc extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'prop_document_id',
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
        'uploaded_by',
    ];

    /* ================= Relationships ================= */

    public function propDocument(): BelongsTo // checked from my end
    {
        return $this->belongsTo(PropDocument::class, 'prop_document_id');
    }
}
