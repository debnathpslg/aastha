<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageKnow extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'language_knows';

    protected $fillable = [
        'employee_joining_id',
        'language_id',
        'can_understand',
        'can_speak',
        'can_read',
        'can_write',
        'created_by',
        'updated_by',
    ];

    /* ================= Relationships ================= */

    public function employeeJoining(): BelongsTo // checked from my end
    {
        return $this->belongsTo(EmployeeJoining::class, 'employee_joining_id');
    }

    public function language(): BelongsTo // checked from my end
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    /* ================= Attributes ================= */

}
