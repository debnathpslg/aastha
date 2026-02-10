<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_id',

        // new
        'role_id',
        'is_su',
        'is_active',
        'created_by',
        'last_updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_su' => 'boolean',
    ];

    // ========== Relation ==========

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // ========== Relation ==========
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ? ucwords(strtolower($value)) : null
        );
    }

    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value ? strtolower($value) : null
        );
    }
}
