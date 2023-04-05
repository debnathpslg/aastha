<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ifsc extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank', 'ifsc', 'branch', 'address', 'city1', 'city2', 'state', 'std_code', 'phone'
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
