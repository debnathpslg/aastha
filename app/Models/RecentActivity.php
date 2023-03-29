<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecentActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'to',
        'user_id',
        'title',
        'content',
        'component',
        'bs_colour',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
