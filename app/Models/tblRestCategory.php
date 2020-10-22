<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblRestCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'id','rest_id','category'
    ];
}
