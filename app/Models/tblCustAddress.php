<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblCustAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'addresss_line','city','state','pincode',
        'customer_id',
    ];
}
