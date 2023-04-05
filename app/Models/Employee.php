<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employee_code',
        'work_status_id',
        'location_id',
        'designation_id',
        'employee_name',
        'fathers_name',
        'address',
        'pin',
        'email',
        'mobile_no',
        'alternate_no',
        'office_mobile_no',
        'date_of_birth',
        'date_of_join',
        'date_of_resignation',
        'local_guardian_name',
        'local_guardian_contact_no',
        'account_holder_name',
        'relationship_id',
        'account_number',
        'ifsc_id',
        'aadhaar_no',
        'pan_no',
        'is_authorised',
        'is_bank_changed',
        'created_by_id',
    ];

    public function workStatus()
    {
        return $this->belongsTo('App\Models\WorkStatus');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function designation()
    {
        return $this->belongsTo('App\Models\Designation');
    }

    public function relationship()
    {
        return $this->belongsTo('App\Models\Relationship');
    }

    public function ifsc()
    {
        return $this->belongsTo('App\Models\Ifsc');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function employeeBankChange()
    {
        return $this->hasMany('App\Model\EmployeeBankChange');
    }
}
