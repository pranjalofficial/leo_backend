<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblCustomer extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id','first_name', 'last_name', 'mobile_no', 'email_id',
        'date_of_birth', 'gender', 'email_verification', 'password'

    ];
}
