<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_create extends Model
{
    protected $table = 'user_creates';

    protected $fillable = [
        'user_id',
        'email',
        'password',
        'creator_user_id',
    ];
}
