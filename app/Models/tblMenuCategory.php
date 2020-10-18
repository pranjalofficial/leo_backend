<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblMenuCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'description', 'rest_id'
    ];
}
