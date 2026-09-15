<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{

 protected $table = 'user';
   protected $fillable = [
    'full_name', 'mobile_no', 'email', 'official_email', 
    'password', 'responsible_person', 'department', 
    'voip_user_name', 'company_name', 'extension_number', 'status', 'photo', 'document',
    'name','remail','phone','address_line1','address_line2','post_code','city'
];

public function bankdetails()
{
    return $this->hasOne(BankDetail::class);
}
public function documents()
{
    return $this->hasMany(Document::class);
}
}