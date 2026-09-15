<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $fillable = [
    'roll_no', 'first_name', 'last_name', 'father_name', 
    // 'dob_day', 'dob_month', 'dob_year', 
    'dob',  'mobile_no', 'email', 'password', 'gender', 'department', 
    'course', 'photo', 'city', 'address'
];
}
