<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    //
    use HasFactory, SoftDeletes, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'slug',
        'level',
        'permission',
        'is_system'
    ];

    // ========== Bitmask Helpers ==========

    const READ      = 1;   // 00000001
    const CREATE    = 2;   // 00000010
    const UPDATE    = 4;   // 00000100
    const DELETE    = 8;   // 00001000
    const AUTHORIZE = 16;  // 00010000

    public function canRead()
    {
        return ($this->permission & self::READ) == self::READ;
    }

    public function canCreate()
    {
        return ($this->permission & self::CREATE) == self::CREATE;
    }

    public function canUpdate()
    {
        return ($this->permission & self::UPDATE) == self::UPDATE;
    }

    public function canDelete()
    {
        return ($this->permission & self::DELETE) == self::DELETE;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value ? ucwords($value) : null
        );
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value ? strtoupper($value) : null
        );
    }
}
