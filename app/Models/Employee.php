<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\Address;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'company', 'email', 'phone'];

    public function company() {
        return $this->belongsTo(Company::class, 'company');
    }

    public function getFirstNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getLastNameAttribute($value)
    {
        return strtoupper($value);
    }

    // static public function getFullNameAttribute() {

    //     $employees = Employee::latest()->get();

    //     foreach ($employees as $employee) {
    //         $employee['full_name'] = $employee->first_name . $employee->last_name;
    //     }

    //     return $employees;
    // }
}
