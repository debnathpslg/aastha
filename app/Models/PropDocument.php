<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropDocument extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'id',
        'Prop_doc_type_id',
        'created_by',
        'updated_by',
    ];

    /* ================= Relations ================= */

    public function propDocType(): BelongsTo // checked from my end
    {
        return $this->belongsTo(PropDocType::class, 'Prop_doc_type_id');
    }

    public function uploadedPropDocs(): HasMany // checked from my end
    {
        return $this->hasMany(UploadedPropDoc::class, 'Prop_document_id');
    }
}
