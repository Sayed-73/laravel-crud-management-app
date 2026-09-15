<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registration';
    protected $fillable = [
        'student_id', 'first_name', 'middle_name', 'last_name', 
        'gender', 'dob', 'email', 'phone', 
        'program_applied', 'campus', 'program_year'
    ];
}
