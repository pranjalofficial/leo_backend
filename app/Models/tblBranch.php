<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','address_line','city','state','pincode','rest_id',
        'latitude','longitude'
    ];
}
