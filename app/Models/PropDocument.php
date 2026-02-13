<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropDocument extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'id',
        'prop_doc_type_id',
        'has_uploaded_file',
        'created_by',
        'updated_by',
    ];

    /* ================= Relations ================= */

    public function propDocType(): BelongsTo // checked from my end
    {
        return $this->belongsTo(PropDocType::class, 'prop_doc_type_id');
    }

    public function uploadedPropDoc(): HasOne // checked from my end
    {
        return $this->HasOne(UploadedPropDoc::class, 'prop_document_id');
    }
}
