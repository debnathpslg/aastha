<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeBankChange extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_id',
        'account_holder_name',
        'relationship_id',
        'account_number',
        'ifsc_id',
        'is_updated',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function ifsc()
    {
        return $this->belongsTo('App\Models\Ifsc');
    }

    public function relationship()
    {
        return $this->belongsTo('App\Models\Relationship');
    }
}
