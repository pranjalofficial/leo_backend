<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblAddOns extends Model
{
    use HasFactory;

    protected $fillable=[
        'id', 'name', 'rate','menu_item_id','branch_id'
    ];
}
