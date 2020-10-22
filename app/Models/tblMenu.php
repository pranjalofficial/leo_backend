<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'item_name', 'item_description', 'item_rate','item_img',
        'menu_category_id', 'branch_id'
    ];
}
