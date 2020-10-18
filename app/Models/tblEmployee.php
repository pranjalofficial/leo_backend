<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblEmployee extends Model
{
    use HasFactory;

    protected $fillable= [
        'id','first_name','last_name','mobile_no','email_id','role',
        'branch_id','password'
    ];
}
