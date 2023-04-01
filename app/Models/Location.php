<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'short_name',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_locations')->withTimestamps()->orderByPivot('users.name');
    }

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
