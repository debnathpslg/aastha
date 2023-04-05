<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relationship extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function employee()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function employeeBankChange()
    {
        return $this->hasMany('App\Model\EmployeeBankChange');
    }

}
