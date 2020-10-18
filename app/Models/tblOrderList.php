<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblOrderList extends Model
{
    use HasFactory;

    protected $fillable=[
        'id', 'item_name', 'item_cost', 'item_count', 
        'item_total', 'branch_id', 'invoice_id'
    ];
}
