<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblTables extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'branch_id','qr_code_img'
    ];
}
