<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    protected $fillable = [
        'account_name',
        'account_number',
        'sort_code'
    ];
}
